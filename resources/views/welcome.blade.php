
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Shopilimun</title>
    <link rel="stylesheet" href="{{ asset('css/shopilimun-auth.css') }}">
</head>
<body>
    <div class="auth-page">
        <div class="auth-container">

            <div class="brand">
                <h1>Shopilimun</h1>
                <p>Your marketplace, your community.</p>
            </div>

            <div class="auth-card">
                <h2>Welcome!</h2>
                <p class="subtitle">
                    Sign in to explore PLMUN marketplace and connect with the university community.
                </p>

                @if (session('status'))
                    <div class="status-message">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            required
                            autofocus
                            autocomplete="username"
                        >

                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        >

                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>

                    <button type="submit" class="auth-button">
                        Sign In
                    </button>
                </form>

                <div class="auth-links">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                        <br>
                    @endif

                    Don't have an account?
                    <a href="{{ route('register') }}">Create one</a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
