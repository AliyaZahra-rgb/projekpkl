<!DOCTYPE html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Management Employee</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
	<!-- Place favicon.ico in the root directory -->

	<!-- ========================= CSS here ========================= -->
	<link rel="stylesheet" href="assets/css/bootstrap-5.0.0-beta2.min.css" />
	<link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
	<link rel="stylesheet" href="assets/css/tiny-slider.css" />
	<link rel="stylesheet" href="assets/css/animate.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
	<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

	<!-- ========================= preloader start ========================= -->
	<div class="preloader">
		<div class="loader">
			<div class="spinner">
				<div class="spinner-container">
					<div class="spinner-rotator">
						<div class="spinner-left">
							<div class="spinner-circle"></div>
						</div>
						<div class="spinner-right">
							<div class="spinner-circle"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- preloader end -->


	<!-- ========================= header start ========================= -->
	<header class="header">
		<div class="navbar-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg">
							<a class="navbar-brand" href="index.html">
								<span>Management Employee</span>
							</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
								<div class="ms-auto">
									<ul id="nav" class="navbar-nav ms-auto">
										<li class="nav-item">
											<a class="page-scroll active" href="#home">Home</a>
										</li>
										<li class="nav-item">
											<a class="page-scroll" href="#about">About</a>
										</li>
										<li class="nav-item">
											<a class="page-scroll" href="#features">Features</a>
										</li>
										<li class="nav-item">
											<a class="" href="#0">Pricing</a>
										</li>
										<li class="nav-item">
											<a class="" href="#0">Team</a>
										</li>
									</ul>
								</div>

							</div>
							<!-- navbar collapse -->
							<div class="header-btn">
								<a href="{{ route('admin.register') }}" class="main-btn btn-hover">Admin</a>
							</div>
						</nav>
						<!-- navbar -->
					</div>
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- navbar area -->
	</header>
	<!-- ========================= header end ========================= -->

	<!-- ========================= hero-section start ========================= -->
	<section id="home" class="hero-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-10">
					<div class="hero-content">
						<h1>Kelola Tim Anda dengan Mudah dan Efisien</h1>
						<p>Sistem manajemen karyawan modern untuk mempermudah HR, manajer, dan tim Anda dalam satu genggaman.</p>

						<a href="/register" class="main-btn btn-hover">Register</a>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="hero-image text-center text-lg-end">
						<img src="assets/images/hero/hero-image.svg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= hero-section end ========================= -->

	<!-- ========================= about-section start ========================= -->
	<section id="about" class="about-section">

		<div class="container">
			<div class="row">
				<div class="col-lg-6 order-last order-lg-first">
					<div class="about-image">
						<img src="assets/images/about/about-image.svg" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-content-wrapper">
						<div class="section-title">
							<h2 class="mb-20">Tujuan Pembuatan Website</h2>
							<p class="mb-30">Website ini dibuat untuk mempermudah proses pengelolaan karyawan dalam sebuah perusahaan atau organisasi. Dengan satu platform terpusat, pengguna dapat mencatat absensi, mengelola data karyawan, memproses penggajian, memantau performa, serta menghasilkan laporan secara otomatis dan akurat. Tujuan utama sistem ini adalah mengurangi pekerjaan manual, meminimalkan risiko kesalahan, menghemat waktu, dan meningkatkan efisiensi operasional HR sehingga perusahaan dapat fokus pada pengembangan sumber daya manusia dan pertumbuhan bisnis.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= about-section end ========================= -->

	<!-- ========================= feature-section start ========================= -->
	<section id="features" class="feature-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-10">
					<div class="section-title mb-60">
						<h2 class="mb-20">Fitur Modern</h2>
						<p>Beragam fitur lengkap yang dirancang untuk mempermudah pengelolaan karyawan dari awal hingga akhir.</p>
					</div>
				</div>

				<div class="col-lg-7">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="single-feature">
								<div class="feature-icon">
									<i class="lni lni-display"></i>
								</div>
								<div class="feature-content">
									<h4>Absensi Otomatis & Real-Time</h4>
									<p>Pantau kehadiran karyawan secara langsung tanpa pencatatan manual. 
                                        Sistem mendukung check-in/out digital dan rekap harian otomatis.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="single-feature">
								<div class="feature-icon">
									<i class="lni lni-compass"></i>
								</div>
								<div class="feature-content">
									<h4>Manajemen Data Karyawan</h4>
									<p>Simpan seluruh data personal, kontrak, riwayat jabatan,
                                        hingga dokumen penting dalam satu tempat yang aman dan mudah diakses.</p>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= feature-section end ========================= -->

	<!-- ========================= cta-section start ========================= -->
	<section id="cta" class="cta-section pt-130 pb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-10">
					<div class="cta-content-wrapper">
						<div class="section-title">
							<h2 class="mb-20">Satu Platform, Semua Karyawan Terpantau<br class="d-none d-lg-block"></h2>
							<p class="mb-30">Dirancang untuk perusahaan dari semua ukuran, platform ini membantu HR dan manajer mengelola karyawan secara efisien dan akurat</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="cta-image text-lg-end">
						<img src="assets/images/cta/cta-image.svg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ========================= cta-section end ========================= -->

	<!-- ========================= footer start ========================= -->
	<footer class="footer pt-120">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
					<div class="footer-widget">
						<div class="logo">
							<span>Management Employee</span>
						</div>
						<p class="desc"></p>
						<ul class="social-links">
							<li><a href="#0"><i class="lni lni-facebook"></i></a></li>
							<li><a href="#0"><i class="lni lni-linkedin"></i></a></li>
							<li><a href="#0"><i class="lni lni-instagram"></i></a></li>
							<li><a href="#0"><i class="lni lni-twitter"></i></a></li>
						</ul>
						© all rights reserved by <a href="https://uideck.com/" target="_blank">UIdeck</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
					</div>
				
				</div>
				<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 offset-xl-1">
					<div class="footer-widget">
						<h3>About Us</h3>
						<ul class="links">
							<li><a href="#0">Home</a></li>
							<li><a href="#0">About</a></li>
							<li><a href="#0">Features</a></li>
							<li><a href="#0">Pricing</a></li>
							<li><a href="#0">Contact</a></li>
						</ul>
					</div>
				</div>
			
				</div>
			</div>
		</div>
	</footer>
	<!-- ========================= footer end ========================= -->


	<!-- ========================= scroll-top ========================= -->
	<a href="#" class="scroll-top btn-hover">
		<i class="lni lni-chevron-up"></i>
	</a>

	<!-- ========================= JS here ========================= -->
	<script src="assets/js/bootstrap-5.0.0-beta2.min.js"></script>
	<script src="assets/js/tiny-slider.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/polyfill.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>