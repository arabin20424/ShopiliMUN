```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Shopilimun</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shopilimun.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="card shadow-sm w-100" style="max-width: 450px;">
            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">
                    <h2 class="fw-bold">Shopilimun</h2>
                    <h5 class="mt-3">Forgot Your Password?</h5>
                </div>

                <p class="text-muted small mb-4">
                    No problem! Enter your email address and we'll send you
                    a password reset link.
                </p>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter your email"
                            required
                            autofocus
                        >

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Email Password Reset Link
                    </button>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        Back to Login
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
```