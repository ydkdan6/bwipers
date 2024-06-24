@if ($errors = session('errors'))
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error[0] }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($error = session('error'))
<div class="alert alert-danger" role="alert">
    <ul>
        <li>{{ $error }}</li>
    </ul>
</div>
@endif