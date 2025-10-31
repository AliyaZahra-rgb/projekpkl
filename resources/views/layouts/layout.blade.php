<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <!-- Navbar -->
  <header class="p-3 bg-white border-bottom shadow-sm">
    <div class="container d-flex flex-wrap align-items-center justify-content-between">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="{{ asset('image/header.png') }}" alt="Logo" width="40" height="40" class="me-2">
        <span class="fs-5 fw-bold">Karyawan Management</span>
      </a>

      <ul class="nav col-12 col-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-3 link-dark">Home</a></li>
        <li><a href="#" class="nav-link px-3 link-dark">Features</a></li>
        <li><a href="#" class="nav-link px-3 link-dark">Pricing</a></li>
      </ul>
  </header>

  <main class="container py-4">
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
