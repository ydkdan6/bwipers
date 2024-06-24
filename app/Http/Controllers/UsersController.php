<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(100);
        return view('backend.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate(
                $request,
                [
                    'name' => 'string|required|max:30',
                    'email' => 'string|required|unique:users',
                    'password' => 'string|required',
                    'role' => 'required|in:admin,user,distributor',
                    'status' => 'required|in:active,inactive',
                    'photo' => 'nullable|string',
                ]
            );
            // dd($request->all());
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            // dd($data);
            $status = User::create($data);
            $this->generateReferralCode($status);
            // dd($status);
            if ($status) {
                request()->session()->flash('success', 'Successfully added user');
            } else {
                request()->session()->flash('error', 'Error occurred while adding user');
            }
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            request()->session()->flash('success', $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $this->validate(
                $request,
                [
                    'name' => 'string|required|max:30',
                    'email' => 'string|required',
                    'role' => 'required|in:admin,user,distributor',
                    'status' => 'required|in:active,inactive',
                    'photo' => 'nullable|string',
                ]
            );
            $data = $request->all();

            $status = $user->fill($data)->save();
            $this->generateReferralCode($user);
            if ($status) {
                request()->session()->flash('success', 'Successfully updated');
            } else {
                request()->session()->flash('error', 'Error occurred while updating');
            }
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            request()->session()->flash('success', $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::findorFail($id);
        $status = $delete->delete();
        if ($status) {
            request()->session()->flash('success', 'User Successfully deleted');
        } else {
            request()->session()->flash('error', 'There is an error while deleting users');
        }
        return redirect()->route('users.index');
    }

    public function generateReferralCode(User $user): void
    {
        if ($user->role === 'distributor' && !$user->referral) {
            Referral::create([
                'code' => $this->generateCode(),
                'user_id' => $user->id,
                'isValid' => true,
            ]);
        }
    }

    public function generateCode()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return 'cherix~' . $randomString;
    }
}
