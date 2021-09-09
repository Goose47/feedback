@extends('layouts.auth')

@section('content')
    <main class="form-signin">
        <form action="/login" method="post">
            @csrf
            <h1 class="mb-3 fw-normal">Feedback</h1>
            <h2 class="h3 mb-3 fw-normal">Please log in</h2>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="mb-3">
                <span>Do not have an account yet? <a href="{{ route('registerForm') }}">Join us</a></span>
            </div>
            @isset($error)
                <div class="mb-3">
                    <span>{{ $error }}</span>
                </div>
            @endisset
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
@endsection
