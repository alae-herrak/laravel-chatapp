@extends('layout-auth')

@section('content-auth')
    <div class="row">
        <div class="col text-center d-xl-flex flex-column justify-content-xl-center align-items-xl-center"
            style="background: rgba(248,249,250,0.73);padding: 32px;margin: 32px;border-radius: 10px;">
            <h2>Signup</h2>
            <form method="POST" action="{{ route('signup') }}"
                class="d-xl-flex flex-column justify-content-xl-center align-items-xl-center"
                style="width: 300px;margin: 32px;">
                @csrf

                <input class="form-control" type="text" name="username" placeholder="Username" style="margin-bottom: 16px;">
                <input class="form-control" type="password" name="password" placeholder="Password"
                    style="margin-bottom: 16px;">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password"
                    style="margin-bottom: 16px;">
                <button class="btn btn-success" type="submit" style="width: 100%;">Signup</button>

                @isset($error)
                    <p class="text-danger m-0 mt-3">{{ $error }}</p>
                @endisset
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col text-center text-light">
            <p>Already have an account?&nbsp;<a class="fw-bold link-secondary" href="/login">Login</a></p>
        </div>
    </div>
@endsection
