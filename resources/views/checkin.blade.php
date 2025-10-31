<!-- resources/views/checkin.blade.php -->
<!doctype html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Check-in</title>
  <style>
    .btn { padding: .6rem 1rem; border-radius: 6px; border: none; cursor: pointer; }
    .btn-primary { background: #2563eb; color: white; }
    .btn-disabled { background: #94a3b8; color: white; cursor: not-allowed; }
    .status { margin-top: 1rem; }
  </style>
</head>
<body>
  <h2>Absensi - Check-in</h2>

  <div>
    <button id="btnCheckin" class="btn btn-primary">Check-in Sekarang</button>
    <span id="loading" style="display:none">...menunggu lokasi</span>
  </div>

  <div class="status" id="status"></div>

  <script>
    const btn = document.getElementById('btnCheckin');
    const status = document.getElementById('status');
    const loading = document.getElementById('loading');

    btn.addEventListener('click', async () => {
      status.textContent = '';
      if (!('geolocation' in navigator)) {
        status.textContent = 'Geolocation tidak tersedia di browser ini.';
        return;
      }

      btn.disabled = true;
      btn.classList.add('btn-disabled');
      loading.style.display = 'inline';

      navigator.geolocation.getCurrentPosition(async (pos) => {
        const lat = pos.coords.latitude;
        const lng = pos.coords.longitude;

        try {
          const resp = await fetch('/api/checkin', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
              lat: lat,
              lng: lng,
              // device_id: 'web-'+navigator.userAgent.slice(0,40) // optional
            })
          });

          const data = await resp.json();
          if (resp.ok) {
            status.innerHTML = `<strong style="color:green">${data.message}</strong><br>Jarak ke kantor: ${Math.round(data.data.distance_m)} m`;
          } else {
            status.innerHTML = `<strong style="color:red">${data.message || 'Check-in gagal'}</strong>`;
          }
        } catch (err) {
          console.error(err);
          status.textContent = 'Terjadi kesalahan saat menghubungi server.';
        } finally {
          btn.disabled = false;
          btn.classList.remove('btn-disabled');
          loading.style.display = 'none';
        }

      }, (err) => {
        btn.disabled = false;
        btn.classList.remove('btn-disabled');
        loading.style.display = 'none';

        if (err.code === 1) {
          status.textContent = 'Izin lokasi ditolak. Mohon izinkan akses lokasi.';
        } else if (err.code === 2) {
          status.textContent = 'Lokasi tidak dapat ditemukan.';
        } else {
          status.textContent = 'Gagal mendapatkan lokasi: ' + err.message;
        }
      }, {
        enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 0
      });

    });
  </script>
</body>
</html>
