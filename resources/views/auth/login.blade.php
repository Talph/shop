@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-4 col-lg-4 col-md-4">

            <div class="card o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row py-5 m-0">
                        <div class="col-lg-12">
                            <div class="p-3">
                                <div class="text-center">
                                    
                                    <h1 class="h3 py-3 text-gray-900 mb-4">Welcome!</h1>
                                </div>

                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input id="email" type="email" placeholder="Enter email address..."
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="input-group mb-3">

                                        <input id="password" type="password" id="exampleInputPassword"
                                            placeholder="Password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary col-12 btn-block">
                                        {{ __('Login') }}
                                    </button>
                                    </div>
                                    <small>By clicking the "Login" button, you consent to the use of cookies and similar
                                        technologies described in our <a href="#">Privacy
                                            Policy.</a></small>

                                </form>
                                <hr>
                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                    @endif

                                </div>

                                <div class="text-center">
                                    @if (Route::has('register'))
                                    <a class="small" href="{{ route('register') }}">
                                        {{ __('Register?') }}
                                    </a>
                                    @endif
                                
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection