<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\PostComment;
use App\Models\Referral;
use App\Rules\MatchOldPassword;
use Error;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        $profile = Auth()->user();
        // return $profile;
        return view('user.users.profile')->with('profile', $profile);
    }

    public function profileUpdate(Request $request, $id)
    {
        // return $request->all();
        $user = User::findOrFail($id);
        $data = $request->all();
        $status = $user->fill($data)->save();
        if ($status) {
            notify()->success('Successfully updated your profile');
        } else {
            notify()->error('Please try again!');
        }
        return redirect()->back();
    }

    // Order
    public function orderIndex()
    {
        $orders = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders', $orders);
    }
    public function userOrderDelete($id)
    {
        $order = Order::find($id);
        if ($order) {
            if ($order->status == "process" || $order->status == 'delivered' || $order->status == 'cancel') {
                return redirect()->back()->with('error', 'You can not delete this order now');
            } else {
                $status = $order->delete();
                if ($status) {
                    notify()->success('Order Successfully deleted');
                } else {
                    notify()->error('Order can not deleted');
                }
                return redirect()->route('user.order.index');
            }
        } else {
            notify()->error('Order can not found');
            return redirect()->back();
        }
    }

    public function orderShow($id)
    {
        $order = Order::find($id);
        // return $order;
        return view('user.order.show-order')->with('order', $order);
    }
    // Product Review
    public function productReviewIndex()
    {
        $reviews = ProductReview::getAllUserReview();
        return view('user.review.index')->with('reviews', $reviews);
    }

    public function productReviewEdit($id)
    {
        $review = ProductReview::find($id);
        // return $review;
        return view('user.review.edit')->with('review', $review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewUpdate(Request $request, $id)
    {
        $review = ProductReview::find($id);
        if ($review) {
            $data = $request->all();
            $status = $review->fill($data)->update();
            if ($status) {
                notify()->success('Review Successfully updated');
            } else {
                notify()->error('Something went wrong! Please try again!!');
            }
        } else {
            notify()->error('Review not found!!');
        }

        return redirect()->route('user.productreview.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReviewDelete($id)
    {
        $review = ProductReview::find($id);
        $status = $review->delete();
        if ($status) {
            notify()->success('Successfully deleted review');
        } else {
            notify()->error('Something went wrong! Try again');
        }
        return redirect()->route('user.productreview.index');
    }

    public function userComment()
    {
        $comments = PostComment::getAllUserComments();
        return view('user.comment.index')->with('comments', $comments);
    }
    public function userCommentDelete($id)
    {
        $comment = PostComment::find($id);
        if ($comment) {
            $status = $comment->delete();
            if ($status) {
                notify()->success('Post Comment successfully deleted');
            } else {
                notify()->error('Error occurred please try again');
            }
            return back();
        } else {
            notify()->error('Post Comment not found');
            return redirect()->back();
        }
    }
    public function userCommentEdit($id)
    {
        $comments = PostComment::find($id);
        if ($comments) {
            return view('user.comment.edit')->with('comment', $comments);
        } else {
            notify()->error('Comment not found');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userCommentUpdate(Request $request, $id)
    {
        $comment = PostComment::find($id);
        if ($comment) {
            $data = $request->all();
            // return $data;
            $status = $comment->fill($data)->update();
            if ($status) {
                notify()->success('Comment successfully updated');
            } else {
                notify()->error('Something went wrong! Please try again!!');
            }
            return redirect()->route('user.post-comment.index');
        } else {
            notify()->error('Comment not found');
            return redirect()->back();
        }
    }

    public function changePassword()
    {
        return view('user.layouts.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('user')->with('success', 'Password successfully changed');
    }

    // to get their pages
    public function distributorOnboarding()
    {
        return view('user.distributor-onboarding');
    }

    public function distributorOnboardingProcess()
    {
        return view('user.distributor-onboarding-process');
    }

    public function salesPersonOnboardingProcess()
    {
        if (auth()->user()->role == 'sales_person') {
            return redirect()->route('user');
        }
        return view('user.sales-person.index');
    }


    public function salesPersonOnboardingRegister(Request $request)
    {
        try {
            $request->validate([
                'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'state' => 'required|string',
                'monthly_sales_volume' => 'required|string',
                'referral_code' => 'nullable|exists:referrals,code',
                'agree' => 'required',
            ]);

            $getReferralCode = Referral::where('code', $request->referral_code)->first();

            if (!$getReferralCode) {
                throw new \Exception('Invalid code');
            }

            auth()->user()->update([
                'role' => 'sales_person',
                'state' => $request->state,
                'monthly_sales_volume' => $request->monthly_sales_volume,
                'photo' => $request->file('profile')->store('profiles/sales-person-images', 'public'),
                'referral_id' => $getReferralCode->user_id,
            ]);

            session()->flash('success', 'Registration successful');
            return redirect()->route('user');
        } catch (\Throwable $th) {
            return back()->with('error', 'Oops! ' . $th->getMessage());
        }
    }
}
