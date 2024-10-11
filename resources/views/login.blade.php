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
                                    <input type="text" class="form-control bg-light text-black" name="email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control bg-light text-black" id="password"
                                            name="password" value="{{ old('password') }}">
                                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                            <i class="fas fa-eye" id="eyeIcon"></i> <!-- Ícone de olho -->
                                        </span>
                                    </div>
                                    @error('password')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit"
                                        class="btn btn-success text-light w-100 btn-outline-dark">LOGIN</button>
                                </div>
                            </form>
                            @if ($errors->has('login_error'))
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first('login_error') }}
                                </div>
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

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function(e) {
            // Alternar entre 'password' e 'text'
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Alterar o ícone (olho aberto/fechado)
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
@endsection
