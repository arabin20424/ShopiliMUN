
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Products - ShopiliMUN</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Shopilimun.css') }}" rel="stylesheet">
</head>

<body>

<div class="container-fluid">
    <div class="row">

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


        <!-- Main Content -->
<div class="col-12 col-lg-10 mx-auto px-4 px-md-5 py-4">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

                <div>
                    <h2 class="fw-bold">My Products</h2>
                    <p class="text-muted">
                        Manage your posted products for sale or rent.
                    </p>
                </div>

                <a href="{{ route('products.create') }}"
                   class="btn btn-primary">
                    + Post New Product
                </a>

            </div>


            <!-- Product List -->
            <div class="row g-4">

                @forelse ($products as $product)

                    <div class="col-md-6 col-lg-4 col-xl-3">

                        <div class="card h-100 shadow-sm border-0">

                            <!-- Product Image -->
                            @if ($product->image)

                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="card-img-top"
                                     style="height: 200px; object-fit: contain; background: #f8f8f8;">

                            @else

                                <div class="d-flex justify-content-center align-items-center bg-light"
                                     style="height: 200px;">
                                    <span class="text-muted">
                                        No Image Available
                                    </span>
                                </div>

                            @endif


                            <!-- Product Details -->
                            <div class="card-body">

                                <h5 class="card-title fw-bold">
                                    {{ $product->name }}
                                </h5>

                                <p class="text-muted mb-2">
                                    {{ $product->category }}
                                </p>

                                <h5 class="text-success fw-bold">
                                    ₱{{ number_format($product->price, 2) }}
                                </h5>

                                <p class="mb-2">
                                    Listing Type:

                                    <span class="badge bg-info text-dark">
                                        {{ $product->listing_type }}
                                    </span>
                                </p>

                                <p>
                                    Status:

                                    @if ($product->status == 'Available')

                                        <span class="badge bg-success">
                                            Available
                                        </span>

                                    @elseif ($product->status == 'Sold')

                                        <span class="badge bg-secondary">
                                            Sold
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            {{ $product->status }}
                                        </span>

                                    @endif

                                </p>

                            </div>


                            <!-- Product Actions -->
                            <div class="card-footer bg-white border-0 p-3">

                                <div class="d-flex gap-2">

                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="btn btn-outline-success btn-sm w-50">
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}"
                                          method="POST"
                                          class="w-50"
                                          onsubmit="return confirm('Are you sure you want to delete this product?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-outline-danger btn-sm w-100">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="card border-0 shadow-sm text-center p-5">

                            <h5 class="fw-bold">
                                No Products Yet
                            </h5>

                            <p class="text-muted">
                                You haven't posted any products yet.
                                Start selling or renting your pre-loved
                                school materials!
                            </p>

                            <div>
                                <a href="{{ route('products.create') }}"
                                   class="btn btn-primary">
                                    Post Your First Product
                                </a>
                            </div>

                        </div>

                    </div>

                @endforelse

            </div>


            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
    {{ $products->links() }}
</div>

        </div>

    </div>
</div>

</body>
</html>
