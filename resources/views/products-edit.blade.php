
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Shopilimun</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shopilimun.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Shopilimun
        </a>
        <a class="nav-link text-white" href="{{ route('products.index') }}">
            Back to Products
        </a>
    </div>
</nav>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="fw-bold mb-4">Edit Product</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form method="POST"
                        action="{{ route('products.update', $product->id) }}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input id="name" name="name" type="text"
                                class="form-control"
                                value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description"
                                class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (₱)</label>
                            <input id="price" name="price" type="number"
                                min="0" step="0.01" class="form-control"
                                value="{{ old('price', $product->price) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="category"
                                class="form-select" required>
                                @foreach (['Uniforms', 'Books', 'School Supplies', 'Other'] as $category)
                                    <option value="{{ $category }}"
                                        {{ old('category', $product->category) == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="listing_type" class="form-label">Listing Type</label>
                            <select id="listing_type" name="listing_type"
                                class="form-select" required>
                                <option value="Sale"
                                    {{ old('listing_type', $product->listing_type) == 'Sale' ? 'selected' : '' }}>
                                    For Sale
                                </option>
                                <option value="Rent"
                                    {{ old('listing_type', $product->listing_type) == 'Rent' ? 'selected' : '' }}>
                                    For Rent
                                </option>
                            </select>
                        </div>

                        @if ($product->image)
                            <div class="mb-3">
                                <label class="form-label">Current Image</label>
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="Current product image"
                                    class="d-block rounded mb-2"
                                    style="max-width: 220px;">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="image" class="form-label">
                                Replace Image (Optional)
                            </label>
                            <input id="image" name="image" type="file"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">
                                Maximum file size: 2 MB.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>

                        <a href="{{ route('products.index') }}"
                            class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
