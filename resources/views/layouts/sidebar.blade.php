<!doctype html>
<html lang="en">

<head>
    <title>SIRUSA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        #sidebar {
            background: rgba(255, 255, 255, 0.5);
            /* Transparan */
            color: #000;
            /* Teks hitam */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Bayangan */
        }

        #sidebar .list-unstyled.components a {
            color: #000000;
            /* Teks hitam */
        }

        #sidebar .list-unstyled.components a:hover,
        #sidebar .list-unstyled.components a.active {
            color: #fff;
            /* Teks putih saat hover dan aktif */
            background: #026cff;
            /* Background hitam saat hover dan aktif */
        }

        #sidebar .list-unstyled.components a i {
            color: #026cff;
            /* Teks hitam untuk ikon */
        }

        #sidebar .list-unstyled.components a:hover i,
        #sidebar .list-unstyled.components a.active i {
            color: #fff;
            /* Teks putih untuk ikon saat hover dan aktif */
        }
    </style>
</head>

<body>


    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="{{ URL::to('admin') }}" class="img logo rounded-circle mb-5"
                    style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="{{ URL::to('admin') }}" class="nav-link {{ Request::is('admin') ? ' active' : '' }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="{{ URL::to('admin') }}" class="img logo rounded-circle mb-5"
          style="background-image: url(images/logo.jpg);"></a>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="{{ URL::to('admin') }}" class="nav-link {{ Request::is('admin') ? ' active' : '' }}">Home</a>
          </li>
          <li>
            <a href="{{ URL::to('health') }}" class="nav-link {{ Request::is('health') ? ' active' : '' }}">Health Information</a>
          </li>
          <li>
            <a href="{{ URL::to('facilitie') }}" class="nav-link {{ Request::is('facilitie') ? ' active' : '' }}">Facilities</a>
          </li>
          <li>
            <a href="#peopleSubmenu" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle">People</a>
            <ul class="collapse list-unstyled" id="peopleSubmenu">
              <li>
                <a href="{{ URL::to('useradmin') }}">User</a>
              </li>
              <li>
                <a href="{{ URL::to('doctoradmin') }}">Doctor</a>
              </li>
              <li>
                <a href="{{ URL::to('patientadmin') }}">Patient</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#appointmentSubmenu" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle">Appointment</a>
            <ul class="collapse list-unstyled" id="appointmentSubmenu">
              <li>
                <a href="{{ URL::to('consultation') }}">Consultations</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#telemedicineSubmenu" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle">Telemedicine</a>
            <ul class="collapse list-unstyled" id="telemedicineSubmenu">
              <li>
                <a href="{{ URL::to('telemedicine') }}">Telemedicine</a>
              </li>
              <li>
                <a href="{{ URL::to('drug') }}">Drug</a>
              </li>
              <li>
                <a href="{{ URL::to('category') }}">Category</a>
              </li>
              <li>
                <a href="#">Payment</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#doctorSubmenu" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle">Doctor</a>
            <ul class="collapse list-unstyled" id="doctorSubmenu">
              <li>
                <a href="{{ URL::to('schedules') }}">Schedules</a>
              </li>
              </ul>
              <a href="{{ URL::to('configuration') }}">Configuration</a>

          <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Log-Out
            </a>
          </li>
        </ul>
      </div>
    </nav>


                    </li>
                    <li>

                    </li>
                    <li>
                        <a href="#peopleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-users"></i> People
                        </a>
                        <ul class="collapse list-unstyled" id="peopleSubmenu">
                            <li>
                                <a href="{{ URL::to('useradmin') }}"><i class="fas fa-user"></i> User</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('doctoradmin') }}"><i class="fas fa-user-md"></i> Doctor</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('patientadmin') }}"><i class="fas fa-procedures"></i> Patient</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#appointmentSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <i class="fas fa-calendar-check"></i> Appointment
                        </a>
                        <ul class="collapse list-unstyled" id="appointmentSubmenu">
                            <li>
                                <a href="{{ URL::to('consultation') }}"><i class="fas fa-comments"></i>
                                    Consultations</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#telemedicineSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <i class="fas fa-video"></i> Telemedicine
                        </a>
                        <ul class="collapse list-unstyled" id="telemedicineSubmenu">
                            <li>
                                <a href="{{ URL::to('telemedicine') }}"><i class="fas fa-laptop-medical"></i>
                                    Telemedicine</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('drug') }}"><i class="fas fa-pills"></i> Drug</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('category') }}"><i class="fas fa-list"></i> Category</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-credit-card"></i> Payment</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#doctorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-user-md"></i> Doctor
                        </a>
                        <ul class="collapse list-unstyled" id="doctorSubmenu">
                            <li>
                                <a href="{{ URL::to('schedules') }}"><i class="fas fa-calendar-alt"></i> Schedules</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#configurationSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <i class="fa fa-archive" aria-hidden="true"></i> Archieve
                        </a>
                        <ul class="collapse list-unstyled" id="configurationSubmenu">
                            <li>
                                <a href="{{ URL::to('health') }}"
                                    class="nav-link {{ Request::is('health') ? ' active' : '' }}">
                                    <i class="fas fa-heartbeat"></i> Health Information
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('configuration') }}"><i class="fas fa-cogs"></i> Configuration</a>
                            </li>
                            <a href="{{ URL::to('facilitie') }}"
                                class="nav-link {{ Request::is('facilitie') ? ' active' : '' }}">
                                <i class="fas fa-hospital"></i> Facilities
                            </a>
                            <a href="{{ URL::to('brand') }}"
                                class="nav-link {{ Request::is('brand') ? ' active' : '' }}">
                                <i class="fas fa-eye"></i> Brand
                            </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('faq') }}"><i class="fas fa-cogs"></i>Faq</a>
                    </li>
                </ul>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Log-Out
                    </a>
                </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @yield('container')
                                </div><!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>