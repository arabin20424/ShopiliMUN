<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shopilimun — the PLMUN campus marketplace for affordable uniforms, textbooks, and academic supplies.">

    <title>Shopilimun | PLMUN Marketplace</title>



    <!-- Bootswatch CSS -->
    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">

    <!-- Custom Shopilimun CSS -->
    <link href="{{ asset('css/Shopilimun.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-dark sticky-top shadow-sm" data-bs-theme="dark">
        <div class="container">

            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
                <span class="brand-mark">S</span>
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
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-light w-100 mt-2 mt-lg-0 px-3">
                            Login
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('register') }}"
                           class="btn btn-primary w-100 mt-2 mt-lg-0 px-3">
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
            <div class="row align-items-center g-5">

                <div class="col-lg-7 text-center text-lg-start">

                    <span class="badge rounded-pill bg-success bg-opacity-75 mb-3 px-3 py-2">
                     Made for the PLMUN community
                    </span>

                    <h1 class="display-4 fw-bolder lh-sm">
                        Smart finds for
                        <span class="text-primary">student life.</span>
                    </h1>

                    <p class="lead mt-3">
                        Welcome to Shopilimun — a campus marketplace where
                        students and alumni buy, sell, and rent affordable
                        uniforms, textbooks, and academic supplies.
                    </p>

                    <p class="text-muted">
                        Save money, declutter your shelf, and give school
                        essentials a second life.
                    </p>

                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start mt-4">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">
                            Explore Marketplace
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-4">
                            Join Shopilimun
                        </a>
                    </div>

                    <div class="d-flex flex-wrap gap-4 justify-content-center justify-content-lg-start mt-5 pt-lg-3">
                    
                     
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card hero-card border-0 shadow-lg">
                        <div class="card-body p-4 p-lg-5 text-center">

                          

                            <h3 class="fw-bold">Shop smart. Save more.</h3>

                            <p class="text-muted mb-4">
                                One convenient place for students and alumni
                                to exchange affordable school essentials.
                            </p>

                            <ul class="list-unstyled text-start mx-auto small text-muted mb-0">
                                <li class="d-flex align-items-start gap-2 mb-2">
                                    <span class="text-success fw-bold">✓</span>
                                    Email required
                                </li>
                                <li class="d-flex align-items-start gap-2 mb-2">
                                    <span class="text-success fw-bold">✓</span>
                                    Buy, sell, or rent in one place
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <span class="text-success fw-bold">✓</span>
                                    Meet-ups on campus
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-5 bg-light">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="fw-bold">How It Works</h2>
                <p class="text-muted mb-0">Three steps from sign-up to your first deal.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card h-100">
                        <div class="step-number">1</div>
                        <h5 class="fw-bold">Create an account</h5>
                        <p class="text-muted mb-0">
                            Register with your PLMUN email so buyers and
                            sellers are all part of the community.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="step-card h-100">
                        <div class="step-number">2</div>
                        <h5 class="fw-bold">Post or browse</h5>
                        <p class="text-muted mb-0">
                            List an item in minutes, or search the categories
                            for what you need this semester.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="step-card h-100">
                        <div class="step-number">3</div>
                        <h5 class="fw-bold">Meet and trade</h5>
                        <p class="text-muted mb-0">
                            Agree on a price, meet on campus, and hand the
                            item over — no shipping, no hassle.
                        </p>
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
                <p class="text-muted mb-0">Find the essentials you need for school.</p>
            </div>

            <div class="row g-4">

                <!-- Uniforms -->
                <div class="col-md-4">
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        <div class="card category-card h-100 shadow-sm border-0">
                            <div class="card-body p-4 text-center">

                                

                                <h4 class="card-title h5">School Uniforms</h4>

                                <p class="card-text text-muted">
                                    Affordable pre-loved uniforms for your
                                    school needs.
                                </p>

                                <span class="category-link">
                                    Browse uniforms &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Books -->
                <div class="col-md-4">
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        <div class="card category-card h-100 shadow-sm border-0">
                            <div class="card-body p-4 text-center">

                               

                                <h4 class="card-title h5">Books and References</h4>

                                <p class="card-text text-muted">
                                    Buy or rent textbooks and reference
                                    materials for your subjects.
                                </p>

                                <span class="category-link">
                                    Browse books &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Supplies -->
                <div class="col-md-4">
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        <div class="card category-card h-100 shadow-sm border-0">
                            <div class="card-body p-4 text-center">

                               

                                <h4 class="card-title h5">Academic Supplies</h4>

                                <p class="card-text text-muted">
                                    Useful school supplies at
                                    student-friendly prices.
                                </p>

                                <span class="category-link">
                                    Browse supplies &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section py-5">
        <div class="container text-center py-4">

            <span class="badge rounded-pill bg-dark mb-3 px-3 py-2">About us</span>

            <h2 class="fw-bold mb-3">About Shopilimun</h2>

            <p class="mx-auto text-muted" style="max-width: 750px;">
                Shopilimun is a campus marketplace designed for PLMUN students
                and alumni. It makes school essentials more accessible by
                letting users buy, sell, and rent pre-loved items in one
                convenient platform — cheaper for buyers, easier for sellers,
                and a little better for the planet.
            </p>

            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 mt-3">
                Get Started
            </a>

        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-5 mt-auto">
        <div class="container">
            <div class="row g-4 align-items-start">

                <div class="col-lg-5 text-center text-lg-start">
                    <h5 class="fw-bold mb-2">Shopilimun</h5>
                    <p class="text-muted mb-0">
                        Affordable finds. Sustainable choices.
                    </p>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h6 class="fw-bold text-uppercase small mb-3">Explore</h6>
                    <ul class="list-unstyled footer-links mb-0">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#how-it-works">How It Works</a></li>
                        <li><a href="#categories">Categories</a></li>
                        <li><a href="#about">About Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold text-uppercase small mb-3">Account</h6>
                    <ul class="list-unstyled footer-links mb-0">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                    </ul>
                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <small class="text-muted">
                    &copy; {{ date('Y') }} Shopilimun. All rights reserved.
                </small>
                <small class="text-muted">
                    A student project for the PLMUN community.
                </small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
