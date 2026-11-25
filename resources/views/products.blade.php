
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
                        <a class="nav-link" href="{{ route('my.products') }}">
                            My Products
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


        <!-- Error Message -->
        @if (session('error'))

            <div class="alert alert-danger alert-dismissible fade show"
                role="alert">

                {{ session('error') }}

                <button type="button" class="btn-close"
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

                    <!-- Search -->
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


                    <!-- Category -->
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


                    <!-- Search Button -->
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
        <h3 class="mb-3 fw-bold">
            Available Products
        </h3>


        <!-- Scrollable Product Listings -->
        <div class="product-listings-scroll">

            <div class="product-grid">

                @forelse ($products as $product)

                    <!-- Product Card -->
                    <div class="card product-card shadow-sm border-0">


                        <!-- Product Details -->
                        <div class="card-body">

                            <!-- Seller Information -->
                            <div class="d-flex align-items-center gap-2 mb-3">

                                <div class="rounded-circle bg-light border
                                    d-flex align-items-center justify-content-center seller-avatar">

                                    <span class="fw-bold">
                                        {{ strtoupper(substr($product->user->name ?? 'U', 0, 1)) }}
                                    </span>

                                </div>

                                <div class="overflow-hidden">

                                    <div class="fw-bold text-truncate">
                                        {{ $product->user->name ?? 'Seller' }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $product->category }}
                                        · For {{ $product->listing_type }}
                                    </small>

                                </div>

                            </div>


                            <!-- Product Name -->
                            <h5 class="card-title product-title fw-bold">
                                {{ $product->name }}
                            </h5>


                            <!-- Product Description -->
                            <p class="card-text text-muted product-description">
                                {{ $product->description }}
                            </p>


                            <!-- Product Image -->
                            @if ($product->image)

                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="img-fluid product-image">

                            @else

                                <div class="product-image d-flex
                                    justify-content-center align-items-center">

                                    <span class="text-muted">
                                        No Image Available
                                    </span>

                                </div>

                            @endif


                            <!-- Product Price -->
                            <h5 class="text-primary fw-bold mt-3 mb-3">

                                ₱{{ number_format($product->price, 2) }}

                                @if ($product->listing_type === 'Rent')

                                    <small class="text-muted">
                                        rental price
                                    </small>

                                @endif

                            </h5>

                        </div>


                        <!-- Product Action Footer -->
                        <div class="card-footer">

                            <div class="product-actions">

                                @if ($product->user_id == Auth::id())

                                    <!-- Edit Button -->
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-outline-primary">

                                        Edit

                                    </a>


                                    <!-- Delete Button -->
                                    <form action="{{ route('products.destroy', $product->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-outline-danger">

                                            Delete

                                        </button>

                                    </form>

                                @else

                                    <!-- Inquire Now Button -->
                                    <form action="{{ route('products.inquire', $product->id) }}" method="POST">
    @csrf

    <button type="submit" class="btn btn-success">
        Inquire Now
    </button>
</form>

                                @endif

                            </div>

                        </div>

                    </div>


                @empty

                    <!-- Empty State -->
                    <div class="card shadow-sm product-empty">

                        <div class="card-body text-center py-5">

                            <h5 class="fw-bold">
                                No Products Found
                            </h5>

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

                @endforelse

            </div>

        </div>


        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">

            {{ $products->links() }}

        </div>

    </main>




    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
