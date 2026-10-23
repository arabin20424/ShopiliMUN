
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Shopilimun</title>

    <!-- Local Bootswatch Litera CSS -->
    <link href="{{ asset('css/bootstrap-litera.min.css') }}"
          rel="stylesheet">

    <!-- Custom Shopilimun CSS -->
    <link href="{{ asset('css/Shopilimun.css') }}"
          rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"
         data-bs-theme="dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                Shopilimun
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Create Account
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Login Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center"
                 style="min-height: 75vh;">

                <div class="col-12 col-md-8 col-lg-5">

                    <div class="text-center mb-4">
                        <h1 class="fw-bold">Welcome Back!</h1>

                        <p class="text-muted">
                            Log in to your Shopilimun account.
                        </p>
                    </div>

                    <!-- Login Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4 p-md-5">

                            <!-- Session Status -->
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <!-- General Login Error -->
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email"
                                           class="form-label">
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        placeholder="Enter your email"
                                        autocomplete="username"
                                        required
                                        autofocus>

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password"
                                           class="form-label">
                                        Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter your password"
                                        autocomplete="current-password"
                                        required>

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="form-check mb-3">
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                        class="form-check-input">

                                    <label class="form-check-label"
                                           for="remember">
                                        Remember me
                                    </label>
                                </div>

                                <!-- Forgot Password -->
                                @if (Route::has('password.request'))
                                    <div class="mb-4 text-end">
                                        <a href="{{ route('password.request') }}"
                                           class="text-decoration-none">
                                            Forgot password?
                                        </a>
                                    </div>
                                @endif

                                <!-- Login Button -->
                                <button type="submit"
                                        class="btn btn-primary w-100">
                                    Log In
                                </button>

                            </form>

                            <!-- Registration Link -->
                            <div class="text-center mt-4">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}"
                                       class="fw-bold text-decoration-none">
                                        Sign Up
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ url('/') }}"
                           class="text-decoration-none">
                            &larr; Back to Home
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-3">
        <div class="container">
            <small>
                &copy; {{ date('Y') }} Shopilimun.
                Affordable Finds. Sustainable Choices.
            </small>
        </div>
    </footer>

    <!-- Local Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
