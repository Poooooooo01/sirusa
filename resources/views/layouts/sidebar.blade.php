<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIRUSA</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ URL::to('assets/img/icon.jpg') }}">

    <!-- Inline Styles -->
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
        <!-- Sidebar -->
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
                        <a href="#peopleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-users"></i> People
                        </a>
                        <ul class="collapse list-unstyled" id="peopleSubmenu">
                            <li>
                                <a href="{{ URL::to('useradmin') }}"
                                    class="nav-link {{ Request::is('useradmin') ? ' active' : '' }}"><i
                                        class="fas fa-user"></i> User</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('doctoradmin') }}"
                                    class="nav-link {{ Request::is('doctoradmin') ? ' active' : '' }}"><i
                                        class="fas fa-user-md"></i> Doctor</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('patientadmin') }}"
                                    class="nav-link {{ Request::is('patientadmin') ? ' active' : '' }}"><i
                                        class="fas fa-procedures"></i> Patient</a>
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
                                <a href="{{ URL::to('consultation') }}"
                                    class="nav-link {{ Request::is('consultation') ? ' active' : '' }}"><i
                                        class="fas fa-comments"></i> Consultations</a>
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
                                <a href="{{ URL::to('drug') }}"
                                    class="nav-link {{ Request::is('drug') ? ' active' : '' }}"><i
                                        class="fas fa-pills"></i> Drug</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('category') }}"
                                    class="nav-link {{ Request::is('category') ? ' active' : '' }}"><i
                                        class="fas fa-list"></i> Category</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('telemedicine') }}"
                                    class="nav-link {{ Request::is('payment') ? ' active' : '' }}"><i
                                        class="fas fa-credit-card"></i> Payment</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#doctorSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-user-md"></i> Doctor
                        </a>
                        <ul class="collapse list-unstyled" id="doctorSubmenu">
                            <li>
                                <a href="{{ URL::to('schedules') }}"
                                    class="nav-link {{ Request::is('schedules') ? ' active' : '' }}"><i
                                        class="fas fa-calendar-alt"></i> Schedules</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ URL::to('testimon') }}"
                            class="nav-link {{ Request::is('testimon') ? ' active' : '' }}">
                            <i class="fas fa-comment"></i> Testimoni
                        </a>
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
                                <a href="{{ URL::to('configuration') }}"
                                    class="nav-link {{ Request::is('configuration') ? ' active' : '' }}"><i
                                        class="fas fa-cogs"></i> Configuration</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('faq') }}"
                                    class="nav-link {{ Request::is('faq') ? ' active' : '' }}"><i
                                        class="fas fa-question"></i> FAQ</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('aboutDetail') }}"
                                    class="nav-link {{ Request::is('aboutDetail') ? ' active' : '' }}"><i
                                        class="fas fa-info-circle"></i> About</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('homeDetail') }}"
                                    class="nav-link {{ Request::is('homeDetail') ? ' active' : '' }}"><i
                                        class="fas fa-home"></i> Home Detail</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('gallery') }}"
                                    class="nav-link {{ Request::is('gallery') ? ' active' : '' }}"><i
                                        class="fas fa-image"></i> Gallery</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('facilitie') }}"
                                    class="nav-link {{ Request::is('facilitie') ? ' active' : '' }}"><i
                                        class="fas fa-hospital"></i> Facilities</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('brand') }}"
                                    class="nav-link {{ Request::is('brand') ? ' active' : '' }}"><i
                                        class="fas fa-eye"></i> Brand</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-file-alt"></i> Report
                        </a>
                        <ul class="collapse list-unstyled" id="reportSubmenu">
                            <li>
                                <a href="{{ URL::to('report') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="fas fa-users"></i> Guest Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('drugreport') }}"
                                    class="nav-link {{ Request::is('drugreport') ? ' active' : '' }}">
                                    <i class="fas fa-pills"></i> Drug Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('transaction') }}"
                                    class="nav-link {{ Request::is('transaction') ? ' active' : '' }}">
                                    <i class="fas fa-money-bill-wave"></i> Transaction Report
                                </a>
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
                    <!-- Sidebar toggle button -->
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
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
        <!-- End Page Content -->
    </div>
    <!-- End Wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function () {

            // Sidebar toggle functionality
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            // Initialize DataTables
            $('#datatable1').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "pageLength": 5, // Menampilkan hanya 5 baris data
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');

            $('#datatable2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 5 // Menampilkan hanya 5 baris data
            });
        });
    </script>

</body>

</html>