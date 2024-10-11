@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8">
            <div class="card bg-light p-5">

                <!-- logo -->
                <div class="text-center p-3">
                    <img src="assets/images/logo.png" alt="Notes logo">
                </div>

                <!-- form -->
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <form action="/loginSubmit" method="post" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="text_username" class="form-label">E-mail</label>
                                <input type="text" class="form-control bg-light text-black" name="email" value="{{ old('email')}}" required>
                                @error('email')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="text_password" class="form-label">Password</label>
                                <input type="password" class="form-control bg-light text-black" name="password"  value="{{ old('password')}}">
                                @error('password')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success text-light w-100 btn-outline-dark">LOGIN</button>
                            </div>
                        </form>
                        @if (session('ErrorLogin'))
                            <div class="alert alert-danger text-light">{{ session('ErrorLogin') }}</div>
                        @endif
                    </div>
                </div>

                <!-- copy -->
                <div class="text-center text-secondary mt-3">
                    <small>Helpdesk</small>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
