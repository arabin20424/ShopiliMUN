
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Post Product - Shopilimun</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shopilimun.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Shopilimun
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        {{ Auth::user()->name }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="mb-4">
                <h1 class="fw-bold">Post a Product</h1>
                <p class="text-muted">
                    Sell or rent your pre-loved school items to the PLMUN community.
                </p>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please check the following:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                        action="{{ route('products.store') }}"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Product Name
                            </label>
                            <input type="text" id="name" name="name"
                                class="form-control" value="{{ old('name') }}"
                                placeholder="e.g. PLMUN School Uniform" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Description
                            </label>
                            <textarea id="description" name="description"
                                class="form-control" rows="4"
                                placeholder="Describe the item's condition and details..."
                                required>{{ old('description') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">
                                    Price (₱)
                                </label>
                                <input type="number" id="price" name="price"
                                    class="form-control" min="0" step="0.01"
                                    value="{{ old('price') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="listing_type" class="form-label">
                                    Listing Type
                                </label>
                                <select id="listing_type" name="listing_type"
                                    class="form-select" required>
                                    <option value="">Select Type</option>
                                    <option value="Sale"
                                        {{ old('listing_type') == 'Sale' ? 'selected' : '' }}>
                                        For Sale
                                    </option>
                                    <option value="Rent"
                                        {{ old('listing_type') == 'Rent' ? 'selected' : '' }}>
                                        For Rent
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">
                                Category
                            </label>
                            <select id="category" name="category"
                                class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach (['Uniforms', 'Books', 'School Supplies', 'Other'] as $category)
                                    <option value="{{ $category }}"
                                        {{ old('category') == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">
                                Product Image (Optional)
                            </label>
                            <input type="file" id="image" name="image"
                                class="form-control" accept="image/*">
                            <div class="form-text">
                                JPG, PNG, or WEBP. Maximum size: 2 MB.
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Post Product
                            </button>
                            <a href="{{ route('products.index') }}"
                                class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="text-center py-3 mt-5">
    <p class="mb-0">
        &copy; {{ date('Y') }} Shopilimun. PLMUN Student Marketplace.
    </p>
</footer>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
