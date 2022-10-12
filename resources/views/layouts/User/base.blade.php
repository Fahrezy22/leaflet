<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('template/user/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('template/user/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template/user/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/user/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/user/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('template/user/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/user/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/user/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('template/user/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

  <!-- Template Main CSS File -->
  <link href="{{asset('template/user/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        {{-- <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a> --}}
        {{-- <i class="bi bi-phone"></i> +1 5589 55488 55 --}}
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> --}}
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><img src="{{asset('template/admin/img/logo/begal.png')}}" width="150px" alt=""></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      {{-- <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 1</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar --> --}}

      <a href="{{route('login')}}" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span> Login</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts" style="margin-top: 100px;">
            <div class="container">

              <div class="row">

                <div class="col-lg-3 col-md-6">
                  <div class="count-box">
                    <i class="fas fa-road"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$data['tkp']}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jalan</p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                  <div class="count-box">
                    <i class="fas fa-gavel"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$data['kasus_selesai']}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Kasus Selesai</p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                  <div class="count-box">
                    <i class="fas fa-gavel"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$data['kasus_terlapor']}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Kasus Terlapor</p>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                  <div class="count-box">
                    <i class="fas fa-gavel"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$total}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Total Kasus</p>
                  </div>
                </div>

              </div>

            </div>
          </section><!-- End Counts Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
            <div class="col-xl-4 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <h3>Informasi Kasus Begal</h3>
              <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

              <div class="icon-box">
                <div class="icon"><i class="bx bx-fingerprint"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>

              <div class="icon-box">
                <div class="icon"><i class="bx bx-gift"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>

              <div class="icon-box">
                <div class="icon"><i class="bx bx-atom"></i></div>
                <h4 class="title"><a href="">Dine Pad</a></h4>
                <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
              </div>
            </div>
          <div class="col-xl-8 col-lg-6 d-flex justify-content-center align-items-stretch ">
            <div id="map" class="map-canvas" data-lat="40.748817" data-lng="-73.985428"
            style="width: 100%; height: 550px; position: relative; overflow: hidden;">
        <script>
            var map = L.map('map').setView([-0.8917, 119.8707], 13);

            L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=iVwxS42CVMlobjgLaPRM', {
                attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
            }).addTo(map);
            var locations = [
                @foreach ($data['kasus'] as $d)
                [`
                    <div class="card card-profile">
                        <div class="card-body pt-0">
                            <div class="text-center">
                            <h5 class="h3">
                            {{$d->kategori_rol->nama_kategori}}
                            </h5>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="card-profile-stats ">
                                <div>
                                    <span class="description">Jalan :</span>
                                    <span class="heading">{{$d->jalan_rol->nama_jalan}}</span>
                                </div>
                                <div>
                                    <span class="description">Jumlah Laporan :</span>
                                    <span class="heading">{{$d->jumlah_laporan}}</span>
                                </div>
                                <div>
                                    <span class="description">Jumlah Laporan Selesai :</span>
                                    <span class="heading">{{$d->jumlah_selesai}}</span>
                                </div>
                                <div>
                                    <span class="description">Jumlah Kasus :</span>
                                    <span class="heading">
                                        @php
                                            $total = $d->jumlah_laporan + $d->jumlah_selesai;
                                        @endphp
                                        {{$total}}
                                    </span>
                                </div>
                                <div>
                                    <span class="description">Keterangan :</span>
                                    <span class="heading">{{$d->keterangan}}</span>
                                </div>
                                <div>
                                    <span class="description">Cara yang digunakan :</span>
                                    <span class="heading">{{$d->cara}}</span>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    </div>
                `, {{ $d->jalan_rol->koordinat }}],
                @endforeach
            ];
            var greenIcon = L.icon({
                iconUrl: '{{asset('static/marker/tinggi.png')}}',
                iconSize:     [75, 50], // size of the icon
            });
            for (var i = 0; i < locations.length; i++) {
                marker = new L.marker([locations[i][1], locations[i][2]],{icon: greenIcon})
                    .bindPopup(locations[i][0])
                    .addTo(map);
            }
        </script>
    </div>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Yoru</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Created with <i class="fa fa-heart text-danger"></i> by <a href="https://www.instagram.com/ahdtola/">Yoru - Team</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('template/user/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('template/user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/user/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('template/user/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('template/user/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template/user/assets/js/main.js')}}"></script>

</body>

</html>
