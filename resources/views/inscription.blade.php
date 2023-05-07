{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="css/app.css">
    <title> Login </title>
</head>

<body>
    <div class="bg-white dar:bg-gray-50">
        <div class="flex justify-center h-screen">
            <div class="hidden md:block md:w-2/4"
                style="background: linear-gradient(180deg, #2EA154 0%, #54B435 68.75%)">
                <div class="flex items-center justify-center w-full h-screen p-8">
                    <img src="images/bigLogo.png" alt="Modern building architecture">
                </div>
            </div>
            <div class="flex items-center w-full h-screen max-w-md px-6 mx-auto md:w-2/4">
                <div class="flex-1">
                    <div class="text-center pb-4 ">
                        <h2 class="text-6xl font-bold text-center text-gray-700 pb-4 text-green-600">Login</h2>
                    </div>
                    <div class="mt-8 h">
                        <form method="POST" action="{{ route('login') }}">

                            <div>
                                <label for="email" class="block mb-2 text-md  "></label>
                                <input type="email" name="email" id="email" placeholder="Email "
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-gray-100 rounded-md placeholder-gray-300  focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
                            <div class="mt-6">
                                <label for="password" class="block mb-2 text-md  "></label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-gray-100 rounded-md placeholder-gray-300  focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
                            <div class="mt-6 flex justify-center">
                                    <button
                                        type="submit"
                                        class="w-48 px-4 py-2 tracking-wide text-white transition-colors duration-200 transform rounded-md bg-green-600 hover:bg-green-400 focus:outline-none focus:bg-green-400 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                                        Login
                                    </button>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}

<!-- resources/views/auth/login.blade.php -->

@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

