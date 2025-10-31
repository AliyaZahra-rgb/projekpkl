// Impor library yang diperlukan (Jika menggunakan Vite/Webpack)
import './bootstrap';
import Chart from 'chart.js/auto'; // Pastikan Chart.js sudah diinstal

// Fungsi untuk menangani interaktivitas Dashboard
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Inisialisasi Chart (Contoh Data)
    function initializeCharts() {
        // Data Dummy
        const performanceData = {
            labels: ['Outstanding', 'Meets Expectation', 'Need Improvement', 'Below Standard'],
            datasets: [{
                data: [35, 50, 10, 5], // Persentase/Jumlah Karyawan
                backgroundColor: [
                    '#28a745', // Hijau (Success)
                    '#007bff', // Biru (Primary)
                    '#ffc107', // Kuning (Warning)
                    '#dc3545'  // Merah (Danger)
                ],
                hoverOffset: 4
            }]
        };

        const attendanceData = {
            labels: ['Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Tingkat Kehadiran (%)',
                data: [98.5, 97.0, 95.8, 96.2, 98.1, 97.5],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                fill: true,
                tension: 0.3
            }]
        };

        // Chart Distribusi Kinerja (Doughnut Chart)
        const performanceCtx = document.getElementById('performanceChart');
        if (performanceCtx) {
             new Chart(performanceCtx, {
                type: 'doughnut',
                data: performanceData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: false,
                        }
                    }
                }
            });
        }

        // Chart Tren Kehadiran (Line Chart)
        const attendanceCtx = document.getElementById('attendanceTrendChart');
        if (attendanceCtx) {
            new Chart(attendanceCtx, {
                type: 'line',
                data: attendanceData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: false,
                            suggestedMin: 95, // Batas bawah sumbu Y
                            suggestedMax: 100
                        }
                    },
                    plugins: {
                         legend: {
                            display: false,
                        },
                         title: {
                            display: false,
                        }
                    }
                }
            });
        }
    }

    // 2. Tandai Sidebar Aktif (Menggunakan URL saat ini)
    function setActiveSidebar() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.main-nav a');

        navLinks.forEach(link => {
            // Hapus class 'active' dari semua item
            link.parentElement.classList.remove('active');

            // Cek jika link href cocok dengan path saat ini
            if (link.getAttribute('href') === currentPath) {
                link.parentElement.classList.add('active');
            }
        });
    }

    // Panggil fungsi setelah DOM dimuat
    initializeCharts();
    // Panggil setActiveSidebar; di Laravel, biasanya Blade sudah menangani ini
    // setActiveSidebar(); 
});