
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile - Shopilimun</title>

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


    <!-- Profile Content -->
    <main class="container py-5">

        <h1 class="fw-bold mb-2">My Profile</h1>

        <p class="text-muted mb-4">
            Manage your personal information and account settings.
        </p>
<!-- Update Profile Information -->
                <section id="profile-info" class="card border-0 shadow-sm mb-4">
                
                    <div class="card-body p-4">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </section>
        <!-- Change Password -->
                <section id="security" class="card border-0 shadow-sm mb-4">
                   
                    <div class="card-body p-4">
                        @include('profile.partials.update-password-form')
                    </div>
                </section>

        <!-- Delete Account -->
                <section id="danger-zone" class="card border-danger shadow-sm mb-4">
                   
                    <div class="card-body p-4">
                        @include('profile.partials.delete-user-form')
                    </div>
                </section>

                <!-- Back button on mobile -->
                <div class="d-md-none mt-3">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
                    </a>
                </div>

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