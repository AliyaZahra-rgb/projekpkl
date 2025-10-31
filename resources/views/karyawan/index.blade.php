<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
   <link rel="stylesheet" href="{{ asset('css/dsh.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="dashboard-container">
        
        <aside class="sidebar">
            
            <div class="user-profile">
                <div class="user-photo">
                    <i class="fas fa-user-circle"></i> 
                </div>

                @auth
                <div class="user-info">
                    <p class="user-name">
                      {{ Auth::User()->name }}
                    </p>
                    <p class="user-title">
                      {{ Auth::Karyawan()->jabatan }}
                    </p>
                </div>
            </div>
            @endauth
            
            <nav class="sidebar-nav">
                <ul>
                    <li class="active"><a href="#"><i class="fas fa-home"></i> DASHBOARD</a></li>
                    <li><a href="{{ route('absensi.scan') }}"><i class="fas fa-calendar-alt"></i> Absen Harian</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="content-header">
                <h1>Data Karyawan</h1>
                <div class="date-filter">
                    <i class="fas fa-calendar-alt"></i> 31 Jul 2020 To 01 Aug 2020
                </div>
            </header>

            <div class="d-flex align-items-center mb-3">
              <a href="{{ route('karyawan.export.spreadsheet') }}" class="btn btn-success">Download Excel</a>
            </div>

            <div class="content-list-container">
                <table class="data-table">
                   <thead>
                    <tr>
                        <th>No</th>
                        <th>Karyawan ID</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Usia</th>
                        <th>Tanggal Mulai Aktif</th>
                        <th>Gaji</th>
                    </tr>
                </thead>
                    <tbody>
                    @forelse ($karyawans as $karyawan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $karyawan->karyawan_id }}</td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->jabatan }}</td>
                            <td>{{ $karyawan->usia }}</td>
                            <td>{{ $karyawan->tanggal_mulai_aktif }}</td>
                            <td>Rp {{ number_format($karyawan->gaji, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data karyawan.</td>
                        </tr>
                    @endforelse
                </tbody>
                </table>
            </div>

        </main>
    </div>

</body>
</html>