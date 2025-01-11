<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rental Management')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
   <!-- Header -->
<div class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4CAF50;"> <!-- Lush Green Color -->
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('enquiries.create') }}">Rental Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('rental_products.index') }}">Rental Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('enquiries.index') }}">Enquiries</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm text-dark" href="{{ route('rental_products.create') }}">Create Rental Product</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-warning btn-sm text-dark" href="{{ route('enquiries.create') }}">Create Enquiry</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container py-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 text-center">
        <p>&copy; {{ date('Y') }} Rental Management System. All Rights Reserved.</p>
    </footer>

</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
