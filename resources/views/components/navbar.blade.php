<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <li class="nav-item"><a class="nav-link"></a></li>
  <div class="container">
    <a class="navbar-brand fw-bold">Absensi QR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.index') }}">Karyawan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('absensi.index') }}">Absensi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('absensi.scan') }}">Scan QR</a></li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-light ms-3">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
