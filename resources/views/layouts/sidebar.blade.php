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
</head>

<body>

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
              <li>
              <a href="{{ URL::to('configuration') }}">Configuration</a>
              </li>
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

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
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
                  @yield("container")
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
