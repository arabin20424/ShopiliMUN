<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Inquiries - Shopilimun</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}"
        rel="stylesheet">

    <link href="{{ asset('css/Shopilimun.css') }}"
        rel="stylesheet">
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
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active"
                            href="{{ route('products.index') }}">
                            Browse Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('my.inquiries') }}">
    My Inquiries
</a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" href="{{ route('seller.inquiries') }}">
        Seller Inquiries
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


    <main class="container py-5">

        <h1 class="fw-bold mb-2">My Inquiries</h1>

        <p class="text-muted mb-4">
            Track the products you have asked sellers about.
        </p>

        @forelse ($inquiries as $inquiry)

            <div class="card shadow-sm mb-3">

                <div class="card-body">

                    <h5 class="fw-bold">
                        {{ $inquiry->product->name }}
                    </h5>

                    <p>
                        <strong>Seller:</strong>
                        {{ $inquiry->seller->name }}
                    </p>

                    <p>
                        <strong>Seller Email:</strong>
                        {{ $inquiry->seller->email }}
                    </p>

                    <p>
                        <strong>Your Message:</strong>
                        {{ $inquiry->message }}
                    </p>

                    <p class="mb-0">
                        <strong>Status:</strong>

                        <span class="badge bg-warning text-dark">
                            {{ $inquiry->status }}
                        </span>
                    </p>

                </div>

            </div>

        @empty

            <div class="alert alert-info">
                You haven't sent any inquiries yet.
                Browse products to find something you need!
            </div>

        @endforelse

        <div class="mt-4">
            {{ $inquiries->links() }}
        </div>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>