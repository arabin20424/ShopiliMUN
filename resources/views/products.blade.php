
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Browse Products - Shopilimun</title>

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

    <!-- Main Content -->
    <main class="container py-5">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center
            flex-wrap gap-3 mb-4">

            <div>
                <h1 class="fw-bold">Browse Products</h1>

                <p class="text-muted mb-0">
                    Find affordable school items from the PLMUN community.
                </p>
            </div>

            <a href="{{ route('products.create') }}"
                class="btn btn-primary">
                + Post Product
            </a>

        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show"
                role="alert">

                {{ session('success') }}

                <button type="button" class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
                </button>
            </div>
        @endif

        @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show"
        role="alert">

        {{ session('error') }}

        <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close">
        </button>

    </div>
@endif

        <!-- Search and Category Filter -->
        <form method="GET"
            action="{{ route('products.index') }}"
            class="card shadow-sm mb-4">

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="search" class="form-label">
                            Search Products
                        </label>

                        <input type="text"
                            id="search"
                            name="search"
                            class="form-control"
                            placeholder="Search products..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-4">
                        <label for="category" class="form-label">
                            Category
                        </label>

                        <select id="category"
                            name="category"
                            class="form-select">

                            <option value="">All Categories</option>

                            @foreach (['Uniforms', 'Books', 'School Supplies', 'Other'] as $category)
                                <option value="{{ $category }}"
                                    {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit"
                            class="btn btn-outline-primary w-100">
                            Search
                        </button>
                    </div>

                </div>
            </div>
        </form>

        <!-- Product Listings Heading -->
        <h3 class="mb-3">Available Products</h3>

        <!-- Product Cards -->
        <div class="row g-4">

            @forelse ($products as $product)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body d-flex flex-column">

                            <!-- Seller Information -->
                            <div class="d-flex align-items-center gap-2 mb-3">

                                <div class="rounded-circle bg-light border
                                    d-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">

                                    <span class="fw-bold">
                                        {{ strtoupper(substr($product->user->name ?? 'U', 0, 1)) }}
                                    </span>

                                </div>

                                <div>
                                    <div class="fw-bold">
                                        {{ $product->user->name ?? 'Seller' }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $product->category }}
                                        · For {{ $product->listing_type }}
                                    </small>
                                </div>

                            </div>

                            <!-- Product Name -->
                            <h5 class="card-title">
                                {{ $product->name }}
                            </h5>

                            <!-- Product Description -->
                            <p class="card-text text-muted">
                                {{ $product->description }}
                            </p>

                            <!-- Product Image -->
                            @if ($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="img-fluid rounded mb-3 w-100"
                                    style="height: 220px; object-fit: cover;">

                            @else

                                <div class="bg-light rounded mb-3
                                    d-flex align-items-center justify-content-center"
                                    style="height: 220px;">

                                    <span class="text-muted">
                                        No image available
                                    </span>

                                </div>

                            @endif

                            <!-- Product Price -->
                            <h5 class="text-primary mb-3">
                                ₱{{ number_format($product->price, 2) }}

                                @if ($product->listing_type === 'Rent')
                                    <small class="text-muted">
                                        rental price
                                    </small>
                                @endif
                            </h5>

                            <!-- Owner Actions -->
                            @if ($product->user_id == Auth::id())

                                <div class="d-flex gap-2 mt-auto">

                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-outline-primary flex-fill">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('products.destroy', $product->id) }}"
                                        method="POST"
                                        class="flex-fill"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-outline-danger w-100">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            @else

    <!-- Inquire Now Button -->
    <form
        action="{{ route('products.inquire', $product->id) }}"
        method="POST"
        class="mt-auto"
        onsubmit="return confirm('Send an inquiry to this seller?');">

        @csrf

        <button type="submit"
            class="btn btn-outline-primary w-100">

            Inquire Now

        </button>

    </form>

@endif

                @empty

    <!-- Empty State -->
    <div class="col-12">

        <div class="card shadow-sm">
            <div class="card-body text-center py-5">

                <h5>No products found</h5>

                <p class="text-muted">
                    Try another search or post the first product
                    on the Shopilimun marketplace.
                </p>

                <a href="{{ route('products.create') }}"
                    class="btn btn-primary">
                    + Post Product
                </a>

            </div>
        </div>

    </div>

@endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>

    </main>

    <!-- Footer -->
    <footer class="text-center py-3 mt-5">
        <p class="mb-0">
            &copy; {{ date('Y') }} Shopilimun.
            PLMUN Student Marketplace.
        </p>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
