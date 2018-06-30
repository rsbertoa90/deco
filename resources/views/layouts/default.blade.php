@include('includes/header_start')

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

@include('includes/header_end')

                   <!-- Page title -->
                   <ul class="list-inline menu-left mb-0">
                    <li class="list-inline-item">
                        <button type="button" class="button-menu-mobile open-left waves-effect">
                            <i class="ion-navicon"></i>
                        </button>
                    </li>
                    <li class="hide-phone list-inline-item app-search">
                        <h3 class="page-title">Dashboard</h3>
                        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                        
                    </li>
                </ul>

                <div class="clearfix"></div>
            </nav>

        </div>
        <!-- Top Bar End -->
           <!-- ==================
                         PAGE CONTENT START
                         ================== -->

            <div class="page-content-wrapper">
                @yield('content');
            </div> <!-- Page content Wrapper -->

          </div> <!-- content -->


@include('includes/footer_start')
    <script src="assets/pages/dashborad.js"></script>
@include('includes/footer_end')



