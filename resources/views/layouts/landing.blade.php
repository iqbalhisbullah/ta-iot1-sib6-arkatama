<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Qbaltech</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="images/qbalputih.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">iqbalhisbullah14@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 858 0431 7228</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="https://github.com/iqbalhisbullah" class="github"><i class="bi bi-github"></i></a>
                <a href="https://www.instagram.com/iqball._/" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/in/iqbalhisbullah" class="linkedin"><i
                        class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">Qbaltech<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="https://wa.me/6285804317228">Contact</a></li>

                    {{-- cek apakah sudah login --}}
                    @if (Auth::check())
                        {{-- jika sudah tampilkan menu dashbord dan logout --}}
                        <li><a class="nav-link scrollto " href="{{ route('logout') }}">Logout</a></li>
                    @else
                        {{-- Jika belum tampilkan register dan login --}}
                        <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                        <li><a class="nav-link scrollto " href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Welcome to <span>QbalTech</span></h1>
            <h2>Your Ultimate IoT Web Monitoring Solution</h2>
            @if (Auth::check())
            <div class="d-flex">
                <a href="{{ route('sensor.index') }}" class="btn-get-started scrollto">Return to Activity</a>
            </div>
            @else
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn-get-started scrollto">Get Started</a>
            </div>
            @endif
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About</h2>
                    <h3>Find Out More <span>About Us</span></h3>
                    <p>Our IoT platform allows you to easily control and monitor all your devices from one place.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter=".filter-card">introduction</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Project Architecture</h4>
                            <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Project Schematic</h4>
                            <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Entity Relationship Diagram</h4>
                            <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team</h2>
                    <h3>Our Hardworking <span>Team</span></h3>
                    <p>To achieve pleasure and enjoyment in life, it is advisable to do things at the right time.</p>
                </div>

                <div class="row d-flex justify-content-center">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://github.com/iqbalhisbullah"><i class="bi bi-github"></i></a>
                                    <a href="https://www.instagram.com/iqball._/"><i class="bi bi-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/iqbalhisbullah"><i
                                            class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Iqbal Hisbullah</h4>
                                <span>Team</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>
                    <p>To fully enjoy the benefits of a connected life, it is essential to manage your devices
                        efficiently.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="mb-4 info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Malang, Jawa Timur, Indonesia</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="mb-4 info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>iqbalhisbullah14@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="mb-4 info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+62 858 0431 7228</p>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Qbaltech</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
