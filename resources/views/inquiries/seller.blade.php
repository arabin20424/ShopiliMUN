<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seller Inquiries - Shopilimun</title>

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

        <h1 class="fw-bold mb-2">Seller Inquiries</h1>

        <p class="text-muted mb-4">
            View buyers who are interested in your products.
        </p>

        @forelse ($inquiries as $inquiry)

            <div class="card shadow-sm mb-3">

                <div class="card-body">

                    <div class="d-flex justify-content-between
                        flex-wrap gap-2">

                        <h5 class="fw-bold">
                            {{ $inquiry->product->name }}
                        </h5>

                        <span class="badge bg-warning text-dark">
                            {{ $inquiry->status }}
                        </span>

                    </div>

                    <hr>

                    <p>
                        <strong>Buyer:</strong>
                        {{ $inquiry->buyer->name }}
                    </p>

                    <p>
                        <strong>Buyer Email:</strong>
                        {{ $inquiry->buyer->email }}
                    </p>

                    <p>
                        <strong>Message:</strong>
                        {{ $inquiry->message }}
                    </p>

                    <p class="text-muted mb-3">
    <small>
        Received:
        {{ $inquiry->created_at->format('M d, Y h:i A') }}
    </small>
</p>

@if ($inquiry->status === 'Pending')

    <form action="{{ route('seller.inquiries.complete', $inquiry->id) }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to complete this inquiry?');">

        @csrf
        @method('PATCH')

        <button type="submit" class="btn btn-success">
            Complete Inquiry
        </button>

    </form>


    <!-- Display success or error messages after form submission -->

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@else

    <button class="btn btn-secondary" disabled>
        <i class="bi bi-check-circle"></i>
        Inquiry Completed
    </button>

@endif
                </div>

            </div>

        @empty

            <div class="alert alert-info">
                You haven't received any product inquiries yet.
            </div>

        @endforelse

        <div class="mt-4">
            {{ $inquiries->links() }}
        </div>

    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>