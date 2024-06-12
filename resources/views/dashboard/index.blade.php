<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIRUSA - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ asset('assets/lightbox/css/lightbox.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .gallery-img {
        width: 100%;
        height: 200px; /* Atau ukuran lain yang diinginkan */
        object-fit: cover;
    }

    .gallery-item {
        overflow: hidden; /* Menyembunyikan bagian gambar yang melebihi ukuran kontainer */
    }

    .pic-container {
    width: 100%;
    height: 250px; /* Adjust height as needed */
    background-color: rgba(240, 240, 240, 0.7); /* Transparent background */
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    overflow: hidden;
    }
    .doctor-img {
        width: calc(100% - 120px); /* Adjusted width to account for the border */
        height: calc(100% - 120px); /* Adjusted height to account for the border */
        object-fit: contain; /* Ensures the entire image fits within the container without being cut off */
        border: 40px solid rgba(221, 221, 221, 0.7); /* Transparent border */
    }
    .member {
        margin-bottom: 20px;
    }

</style>

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="marquee-container">
            <div class="marquee">Selamat Datang di Rumah Sakit SIRUSA. Kesehatan anda adalah prioritas kami</div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
        @foreach ($configurations as $config)
        <h1 class="logo me-auto"><a href="index.html">{{ $config->hospital_name }}</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#departments">Departments</a></li> --}}
                    <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                    {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    {{-- </ul> --}}
                    <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="{{ URL::to('login') }}" class="appointment-btn scrollto">Login</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
        <h1>Welcome to {{ $config->hospital_name }}</h1>
        <h2>{{ $config->subtitle }}</h2>
        @endforeach
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why Choose {{ $config->hospital_name }}?</h3>
                            <p>
                                {{ $config->reason }}
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                @foreach ($homeDetails as $home)
                                <div class="col-xl-4 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            @switch($home->id)
                                                @case(1)
                                                    <i class="bx bx-receipt"></i>
                                                @break

                                                @case(2)
                                                    <i class="bx bx-cube-alt"></i>
                                                @break

                                                @case(3)
                                                <i class="bx bx-images"></i>
                                                @break

                                                @default
                                                <i class="bx bx-default-icon"></i>
                                            @endswitch
                                            <h4>{{ $home->title }}</h4>
                                            <p>{{ $home->description }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">
                @foreach ($configurations as $configuration)
                @php
                // Ekstrak ID video dari link YouTube
                preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/.*(?:v=|\/)([a-zA-Z0-9_-]{11})/', $configuration->about_youtube_link, $matches);
                $youtube_id = $matches[1] ?? '';
                // Bangun URL thumbnail
                $thumbnail_url = $youtube_id ? "https://img.youtube.com/vi/$youtube_id/hqdefault.jpg" : '';
            @endphp
            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative"
                     style="background-image: url('{{ $thumbnail_url }}'); background-size: cover; background-position: center;">
                    <a href="{{ $configuration->about_youtube_link }}" class="glightbox play-btn mb-4"></a>
                </div>

                        <div
                            class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                            <h3>About Us</h3>

                            <p>{{ $configuration->about_text }}</p>
                            @endforeach


                            @foreach ($aboutDetails as $aboutDetail)
                    <div class="icon-box">
                        <div class="icon">
                            @switch($aboutDetail->id)
                                @case(1)
                                    <i class="bx bx-fingerprint"></i>
                                @break

                                @case(2)
                                    <i class="bx bx-gift"></i>
                                @break

                                @case(3)
                                    <i class="bx bx-atom"></i>
                                @break

                                @default
                                    <i class="bx bx-default-icon"></i>
                            @endswitch
                        </div>
                        <h4 class="title"><a href="">{{ $aboutDetail->title }}</a></h4>
                        <p class="description">{{ $aboutDetail->description }}</p>
                    </div>
                @endforeach
            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts py-5">
            <div class="container">
                <div class="row justify-content-center">



                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="count-box text-center p-4">
                            <i class="fas fa-user-md fa-3x mb-3"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $doctorsCount }}"
                                data-purecounter-duration="1" class="purecounter display-4"></span>
                            <p class="mt-2">@lang('Doctors')</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="count-box text-center p-4">
                            <i class="fas fa-user-injured fa-3x mb-3"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $patientCount }}"
                                data-purecounter-duration="1" class="purecounter display-4"></span>
                            <p class="mt-2">@lang('Patients')</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="count-box text-center p-4">
                            <i class="fas fa-user-tie fa-3x mb-3"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $adminCount }}"
                                data-purecounter-duration="1" class="purecounter display-4"></span>
                            <p class="mt-2">@lang('Employes')</p>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">

            <div class="container">

                <div class="section-title">
                    <h2>Services</h2>
                    @foreach ($configurations as $configuration)
                        <p>{{ $configuration->service_text }}</p>
                    @endforeach
                </div>



                <div class="row justify-content-center">
                    @foreach ($facilities as $facility)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="icon-box">
                                <div class="icon"><i class="fas fa-heartbeat"></i></div>
                                <h4><a href="">{{ $facility->facility_name }}</a></h4>
                                <p>{{ $facility->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section><!-- End Services Section -->

        <!-- ======= Appointment Section ======= -->
        <!-- <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Make an Appointment</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <form action="forms/appointment.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Your Name" data-rule="minlen:4"
                                data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <input type="tel" class="form-control" name="phone" id="phone"
                                placeholder="Your Phone" data-rule="minlen:4"
                                data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group mt-3">
                            <input type="datetime" name="date" class="form-control datepicker" id="date"
                                placeholder="Appointment Date" data-rule="minlen:4"
                                data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <select name="department" id="department" class="form-select">
                                <option value="">Select Department</option>
                                <option value="Department 1">Department 1</option>
                                <option value="Department 2">Department 2</option>
                                <option value="Department 3">Department 3</option>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <select name="doctor" id="doctor" class="form-select">
                                <option value="">Select Doctor</option>
                                <option value="Doctor 1">Doctor 1</option>
                                <option value="Doctor 2">Doctor 2</option>
                                <option value="Doctor 3">Doctor 3</option>
                            </select>
                            <div class="validate"></div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Make an Appointment</button></div>
                </form>

            </div>
        </section>End Appointment Section -->

        <!-- ======= Departments Section ======= -->
        {{-- <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cardiology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Hepatology</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pediatrics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Eye Care</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiology</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section --> --}}

<!-- ======= Doctors Section ======= -->
<section id="doctors" class="doctors">
    <div class="container">

        <div class="section-title">
            <h2>Doctors</h2>
            @foreach ($configurations as $configuration)
                <p>{{ $configuration->doctor_text }}</p>
            @endforeach
        </div>

        <div class="row">
            @foreach ($doctors as $doctor)
                <div class="col-lg-6 col-md-6">
                    <div class="member d-flex align-items-start">
                        <div class="pic-container">
                            <a onclick="showDetailImageModal('{{ URL::to('storage/' . $doctor->image) }}')"
                               class="btn btn-link" data-toggle="modal" data-target="#detailImageModal">
                                <img src="{{ URL::to('storage/' . $doctor->image) }}" alt="Image" class="doctor-img">
                            </a>
                        </div>
                        <div class="member-info">
                            <h4>{{ $doctor->name }}</h4>
                            <span>{{ $doctor->specialization }}</span>
                            <p>{{ $doctor->education }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Modal for Image Detail -->
<div class="modal fade" id="detailImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" alt="Doctor Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>


        {{-- <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Anesthesiologist</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cardiology</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Neurosurgeon</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Doctors Section --> --}}

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
        </div>
        @foreach ($faqs as $faq)
            <div class="row">
                <div class="col-md-12">
                    <div class="faq-list">
                        <ul>
                            <li data-aos="fade-up">
                                <i class="bx bx-help-circle icon-help"></i> 
                                <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq-list-{{ $faq->id }}">
                                    {{ $faq->question }} 
                                    <i class="bx bx-chevron-down icon-show"></i>
                                    <i class="bx bx-chevron-up icon-close"></i>
                                </a>
                                <div id="faq-list-{{ $faq->id }}" class="collapse" data-bs-parent=".faq-list">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
    <div class="container">
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <i class="fas fa-user testimonial-img"></i>
                            <h3>{{ $testimonial->nama }}</h3>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $testimonial->star_rating)
                                        <i class="fas fa-star" style="color: #ffc700;"></i>
                                    @else
                                        <i class="fas fa-star" style="color: #ccc;"></i>
                                    @endif
                                @endfor
                            </div>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ $testimonial->commentar }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                </div><!-- End testimonial item -->
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section><!-- End Testimonials Section -->



        <!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container">
        <div class="section-title">
            <h2>Gallery</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row g-0">
            @foreach($galleries as $gallery)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $gallery->photo) }}" data-lightbox="gallery" data-title="Your Image Title">
                            <img src="{{ asset('storage/' . $gallery->photo) }}" alt="" class="img-fluid gallery-img">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section><!-- End Gallery Section -->




        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>
            </div>

            <div class="container">
                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <div>
                                    @foreach ($configurations as $configuration)
                                        <div>
                                                <p><a href="">{{ $configuration->address }}</a></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <div>
                                    @foreach ($configurations as $configuration)
                                        <div>
                                                <p><a href="">{{ $configuration->email }}</a></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <div>
                                    @foreach ($configurations as $configuration)
                                        <div>
                                                <p><a href="">{{ $configuration->phone_number }}</a></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div><br><br><br>
                        </form>

                    </div>

                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20411.744812676472!2d110.45317179182938!3d-6.985703856079094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708cc855dcb68f%3A0x740068fbacb464bc!2sUniversitas%20Semarang!5e0!3m2!1sid!2sid!4v1717494605492!5m2!1sid!2sid"
                         width="100%" height="400px" style="border:0;" allowfullscreen=""
                         loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <!-- Logo -->
                    <div class="col-lg-4 text-center">
                        <img src="images/logo.jpg" alt="Logo" style="width: 150px; height: auto;">
                    </div>
                    <!-- Contact Information -->
                    <div class="col-lg-4">
                        <div class="footer-contact">
                            @foreach ($configurations as $config)
                                <h3>{{ $config->hospital_name }}</h3>
                                <p><a href="">{{ $config->address }}</a></p>
                                <br>
                                <strong>Phone:</strong>
                                <p><a href="">{{ $config->phone_number }}</a></p>
                                <br>
                                <strong>Email:</strong>
                                <p><a href="">{{ $config->email }}</a></p>
                            @endforeach
                        </div>
                    </div>
                    <!-- Useful Links -->
                    <div class="col-lg-4">
                        <div class="footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="container d-md-flex py-4">
        <div class="col-md-4 text-left">
            <div class="copyright">
                @foreach ($configurations as $config)
                    <div class="hospital-info">
                        <h3>{{ $config->hospital_name }}</h3>
                        <p>&copy; {{ date('Y') }} <strong>{{ $config->hospital_name }}</strong>. All Rights
                            Reserved. Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4 text-center">
            <!-- Add some space here -->
        </div>
        <div class="col-md-4 text-right">
            <div class="social-links pt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('assets/lightbox/js/lightbox-plus-jquery.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
    function showDetailImageModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
    }
</script>

</body>

</html>
