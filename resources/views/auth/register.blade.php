
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up | Shopilimun</title>

    <!-- Local Bootswatch Litera CSS -->
    <link href="{{ asset('css/bootstrap-litera.min.css') }}"
          rel="stylesheet">

    <!-- Custom Shopilimun CSS -->
    <link href="{{ asset('css/shopilimun.css') }}"
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

            <!-- Hamburger Menu -->
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
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Registration Section -->
    <section class="py-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">

                    <div class="text-center mb-4">
                        <h1 class="fw-bold">Join Shopilimun!</h1>

                        <p class="text-muted">
                            Create an account and discover affordable
                            school essentials.
                        </p>
                    </div>

                    <!-- Registration Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4 p-md-5">

                            <!-- Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p class="fw-bold mb-2">
                                        Please check the following:
                                    </p>

                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Full Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Full Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="form-control"
                                        value="{{ old('name') }}"
                                        placeholder="Enter your full name"
                                        autocomplete="name"
                                        required
                                        autofocus>
                                </div>

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="form-control"
                                        value="{{ old('email') }}"
                                        placeholder="Enter your email address"
                                        autocomplete="username"
                                        required>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
    <label for="password" class="form-label">Password</label>

    <input
        type="password"
        name="password"
        id="password"
        class="form-control @error('password') is-invalid @enderror"
        required
        autocomplete="new-password"
    >

    <small id="passwordHint" class="form-text text-muted">
        Password must be at least 8 characters long.
    </small>

    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="password_confirmation"
                                           class="form-label">
                                        Confirm Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        class="form-control"
                                        placeholder="Re-enter your password"
                                        autocomplete="new-password"
                                        required>
                                </div>

                                <!-- Sign Up Button -->
                                <button type="submit"
                                        class="btn btn-primary w-100">
                                    Create Account
                                </button>

                            </form>

                            <!-- Login Link -->
                            <div class="text-center mt-4">
                                <p class="mb-0">
                                    Already have an account?
                                    <a href="{{ route('login') }}"
                                       class="fw-bold text-decoration-none">
                                        Log In
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
