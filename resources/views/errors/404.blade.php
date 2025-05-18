{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
            padding-top: 100px;
        }
        .error-image {
            max-width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/404.svg') }}" alt="404 Not Found" class="error-image mb-4">
        <h1 class="display-4">Oops! Page not found.</h1>
        <p class="lead">The page you’re looking for doesn’t exist or has been moved.</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go Home</a>
    </div>
</body>
</html>
