<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container-fluid">
            <!-- Logo: Ganti dengan path logo Anda di public -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('image/icon2.jpeg') }}" alt="Logo" class="me-2" style="width: 40px; height: 40px; border-radius: 50%;"> <!-- Jika logo di public/logo.png -->
                Management Employee
            </a>
            <div class="navbar-nav ms-auto">
                <form class="d-flex me-3" id="searchForm">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search" id="searchInput">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <!-- Dropdown Notifications -->
                <div class="dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i> Notifications <span class="badge bg-danger">3</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="notificationDropdown">
                        <li><a class="dropdown-item" href="#">New user registered</a></li>
                        <li><a class="dropdown-item" href="#">Server update completed</a></li>
                        <li><a class="dropdown-item" href="#">Payment received</a></li>
                    </ul>
                </div>
                <a class="nav-link text-dark" href="#" id="profileLink"><i class="fas fa-user"></i> Profile</a>
            </div>
        </div>
    </nav>