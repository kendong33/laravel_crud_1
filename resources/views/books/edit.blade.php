<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4">Edit Book</h1>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Validation Errors:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="book_name" class="form-label">Book Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('book_name') is-invalid @enderror"
                            id="book_name" name="book_name" value="{{ old('book_name', $book->book_name) }}" required>
                        @error('book_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="book_author" class="form-label">Book Author <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('book_author') is-invalid @enderror"
                            id="book_author" name="book_author" value="{{ old('book_author', $book->book_author) }}" required>
                        @error('book_author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="book_stock" class="form-label">Book Stock <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('book_stock') is-invalid @enderror"
                            id="book_stock" name="book_stock" value="{{ old('book_stock', $book->book_stock) }}" min="0" required>
                        @error('book_stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="book_date" class="form-label">Book Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('book_date') is-invalid @enderror"
                            id="book_date" name="book_date" value="{{ old('book_date', $book->book_date) }}" required>
                        @error('book_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Update Book
                        </button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
