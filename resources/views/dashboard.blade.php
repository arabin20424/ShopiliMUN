
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Shopilimun</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shopilimun.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                Shopilimun
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            Browse Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            My Inquiries
                        </a>
                    </li>

                    <li class="nav-item">
    <a class="nav-link" href="{{ route('profile.edit') }}">
        {{ Auth::user()->name }}
    </a>
</li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm ms-lg-2">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <main class="container py-5">

        <div class="p-4 p-md-5 mb-4 rounded-4 dashboard-welcome">
            <h1 class="fw-bold">
                Welcome, {{ Auth::user()->name }}!
            </h1>

            <p class="lead mb-3">
                Find affordable school supplies and connect with the PLMUN community.
            </p>

            <a href="#" class="btn btn-primary">
                Browse Products
            </a>
        </div>

        <!-- Summary Cards -->
        <h3 class="mb-3">Your Marketplace</h3>

        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Browse Products</h5>
                        <p class="card-text">
                            Explore available uniforms, books, and school supplies.
                        </p>
                        <a href="#" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">My Inquiries</h5>
                        <p class="card-text">
                            Keep track of the products you have asked sellers about.
                        </p>
                        <a href="#" class="btn btn-outline-primary">View Inquiries</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">My Account</h5>
                        <p class="card-text">
                            Manage your account information and profile settings.
                        </p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h4>Getting Started</h4>
                <p class="mb-0">
                    Browse the marketplace, find items you need for school,
                    and send an inquiry to the seller for more information.
                </p>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="text-center py-3 mt-5">
        <p class="mb-0">
            &copy; {{ date('Y') }} Shopilimun. PLMUN Student Marketplace.
        </p>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
```