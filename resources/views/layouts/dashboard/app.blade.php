<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!------------------------dashboard-------------------------------------------->

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->


    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('admin/css/rtl/sb-admin-2.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @endif


    <!------------------------dashboard-------------------------------------------->
    <style type="text/css">
        footer {

            position: relative;
            width: 100%;
            bottom: 0;



        }
    </style>


    @yield('style')


</head>

<body>


    <!---------------------------------------copy code dashboard------------------------------------------>



    <!----------------------------------------------------------------------------------->

    <div id="wrapper">



        {{-- ----------side bar --}}

        @include('layouts.dashboard.includes.sidebar')

        {{-- ----------------------- --}}

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">




                <!-- Topbar nav -->

                @include('layouts.dashboard.includes.navbar')

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!---------------------------------start content---------------------------------------->

                    <div class="to_the_content">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>

                    <!-----------------------------------end content-------------------------------------->





                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto tofooter">
                            <div class="copyright d-flex justify-content-center my-auto">
                                <span>Copyright &copy; Cypher Abdo <?php echo date('Y'); ?></span>
                            </div>

                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <!--   <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> -->

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <button class="btn btn-danger" type="submit">Log Out</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>








            <!----------------------------------------------------------------------------------------------->



            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

            <!-- =========================== plugin ckeditor ================= -->

            <script type="text/javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>


            <!-- =========================== plugin jquery number ================= -->

            <script type="text/javascript" src="{{ asset('plugins/jquery-number/jquery.number.min.js') }}"></script>


            <!-- Custom scripts for all pages-->
            <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

            <!-- Page level plugins -->
            <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>


            <!-- Page level custom scripts -->
            <!--    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
 -->
            <!--   <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
 -->

            @stack('chart')

            <script type="text/javascript" src="{{ asset('admin/js/custom.js') }}"></script>
            <script type="text/javascript" src="{{ asset('admin/js/printThis.js') }}"></script>


</body>

</html>
