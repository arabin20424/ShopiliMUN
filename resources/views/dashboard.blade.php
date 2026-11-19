
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - ShopiliMUN</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Shopilimun.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
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

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link active"
                            href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('products.index') }}">
                            Browse Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('my.inquiries') }}">
                            My Inquiries
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('seller.inquiries') }}">
                            Seller Inquiries
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('my.products') }}">
                            My Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('profile.edit') }}">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="btn btn-outline-light btn-sm ms-lg-2">
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- Main Dashboard Content -->
    <div class="container py-5">

        <!-- Welcome Section -->
        <div class="mb-5">

            <h2 class="fw-bold">
                Welcome, {{ Auth::user()->name }}!
            </h2>

            <p class="text-muted">
                Welcome to ShopiliMUN. Find affordable pre-loved
                school materials or share your own products with
                fellow PLMUN students.
            </p>

        </div>


        <!-- Welcome Banner -->
        <div class="card border-0 shadow-sm mb-5"
            style="background-color: #D9E6D3;">

            <div class="card-body p-4">

                <h4 class="fw-bold">
                    Your Student Marketplace
                </h4>

                <p class="mb-3">
                    Buy, sell, and rent affordable school supplies,
                    uniforms, textbooks, and other academic materials.
                </p>

                <a href="{{ route('products.index') }}"
                    class="btn btn-primary">
                    Explore Products
                </a>

            </div>
        </div>


        <!-- Dashboard Cards -->
        <h4 class="fw-bold mb-4">Quick Access</h4>

        <div class="row g-4">

            <!-- Browse Products -->
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="fw-bold">
                            Browse Products
                        </h5>

                        <p class="text-muted">
                            Discover affordable school materials
                            posted by other students.
                        </p>

                        <a href="{{ route('products.index') }}"
                            class="btn btn-primary w-100">
                            Browse Products
                        </a>

                    </div>
                </div>
            </div>


            <!-- My Inquiries -->
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="fw-bold">
                            My Inquiries
                        </h5>

                        <p class="text-muted">
                            View and track your inquiries
                            about other students' products.
                        </p>

                        <a href="{{ route('my.inquiries') }}"
                            class="btn btn-primary w-100">
                            My Inquiries
                        </a>

                    </div>
                </div>
            </div>


            <!-- My Products -->
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="fw-bold">
                            My Products
                        </h5>

                        <p class="text-muted">
                            View, edit, and manage your
                            posted products.
                        </p>

                        <a href="{{ route('my.products') }}"
                            class="btn btn-primary w-100">
                            My Products
                        </a>

                    </div>
                </div>
            </div>


            <!-- My Account -->
            <div class="col-md-6 col-lg-3">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="fw-bold">
                            My Account
                        </h5>

                        <p class="text-muted">
                            Manage your personal information
                            and account settings.
                        </p>

                        <a href="{{ route('profile.edit') }}"
                            class="btn btn-primary w-100">
                            My Account
                        </a>

                    </div>
                </div>
            </div>

        </div>


        <!-- Getting Started -->
        <div class="card shadow-sm border-0 mt-5">

            <div class="card-body p-4">

                <h5 class="fw-bold mb-3">
                    Getting Started with ShopiliMUN
                </h5>

                <p class="text-muted">
                    Looking for affordable school materials?
                    Visit Browse Products to explore available listings.
                </p>

                <p class="text-muted mb-0">
                    Have unused textbooks, uniforms, or school supplies?
                    Share them with fellow students by posting your products.
                </p>

            </div>
        </div>

    </div>


    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3 mt-5">

        <p class="mb-0">
            &copy; {{ date('Y') }} ShopiliMUN.
            Student Marketplace for PLMUN.
        </p>

    </footer>


    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
