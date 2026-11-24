
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopilimun | PLMUN Marketplace</title>

  <!-- Bootswatch Morph CSS -->
<link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">

<!-- Custom Shopilimun CSS -->
<link href="{{ asset('css/Shopilimun.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
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

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-light mt-2 mt-lg-0">
                            Login
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('register') }}"
                           class="btn btn-primary mt-2 mt-lg-0">
                            Sign Up
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <!-- Welcome Section -->
    <section id="home" class="welcome-section py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center g-4">

                <div class="col-lg-7 text-center text-lg-start">

                    <span class="badge bg-success mb-3">
                        Your Campus Marketplace
                    </span>

                    <h1 class="display-4 fw-bold">
                        Smart Finds for
                        <span class="text-primary">Student Life.</span>
                    </h1>

                    <p class="lead mt-3">
                        Welcome to Shopilimun! Discover affordable
                        school uniforms, textbooks, and academic
                        supplies from the PLMUN community.
                    </p>

                    <p>
                        Buy, sell, or rent pre-loved items and give
                        school essentials a second life.
                    </p>

                    <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start mt-4">

                        <a href="{{ route('login') }}"
                           class="btn btn-primary btn-lg">
                            Explore Marketplace
                        </a>

                        <a href="{{ route('register') }}"
                           class="btn btn-outline-primary btn-lg">
                            Join Shopilimun
                        </a>

                    </div>

                </div>

                <div class="col-lg-5">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4 p-lg-5 text-center">

                            <div class="display-1 mb-3">🎓</div>

                            <h3 class="fw-bold">
                                Shop Smart. Save More.
                            </h3>

                            <p class="text-muted mb-0">
                                A convenient marketplace for
                                students and alumni to exchange
                                affordable school essentials.
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Explore Categories</h2>

                <p class="text-muted">
                    Find the essentials you need for school.
                </p>
            </div>

            <div class="row g-4">

                <!-- Uniforms -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body p-4 text-center">

                            <div class="display-5 mb-3">👕</div>

                            <h4 class="card-title">
                                School Uniforms
                            </h4>

                            <p class="card-text">
                                Find affordable pre-loved uniforms
                                for your school needs.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Books -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body p-4 text-center">

                            <div class="display-5 mb-3">📚</div>

                            <h4 class="card-title">
                                Books and References
                            </h4>

                            <p class="card-text">
                                Buy or rent textbooks and reference
                                materials for your subjects.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Supplies -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body p-4 text-center">

                            <div class="display-5 mb-3">🎒</div>

                            <h4 class="card-title">
                                Academic Supplies
                            </h4>

                            <p class="card-text">
                                Discover useful school supplies
                                at student-friendly prices.
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section py-5">
        <div class="container text-center py-4">

            <h2 class="fw-bold mb-3">
                About Shopilimun
            </h2>

            <p class="mx-auto" style="max-width: 750px;">
                Shopilimun is a campus marketplace designed for
                PLMUN students and alumni. It makes school essentials
                more accessible by allowing users to buy, sell, and
                rent pre-loved items in one convenient platform.
            </p>

            <a href="{{ route('register') }}"
               class="btn btn-primary mt-3">
                Get Started
            </a>

        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center">
        <div class="container">

            <h5 class="fw-bold">Shopilimun</h5>

            <p class="mb-1">
                Affordable Finds. Sustainable Choices.
            </p>

            <small>
                &copy; {{ date('Y') }} Shopilimun.
                All rights reserved.
            </small>

        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    </script>

</body>

</html>
