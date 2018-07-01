@include('includes/header_start')

            <!--Morris Chart CSS -->
            {{-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> --}}

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

                        {{-- <div class="header-bg"> 
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 mb-4 pt-5">
                                        <div id="morris-bar-example" class="dash-chart"></div>
                
                                        <div class="mt-4 text-center">
                                            <button type="button" class="btn btn-outline-primary ml-1 waves-effect waves-light">Year 2017</button>
                                            <button type="button" class="btn btn-outline-info ml-1 waves-effect waves-light">Year 2018</button>
                                            <button type="button" class="btn btn-outline-primary ml-1 waves-effect waves-light">Year 2019</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="container-fluid">
                            
                            @yield('content')
            
                         </div>
            

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

@include('includes/footer_start')

        <!--Morris Chart-->
        {{-- <script src="assets/plugins/morris/morris.min.js"></script> --}}
        {{-- <script src="assets/plugins/raphael/raphael-min.js"></script> --}}

        {{-- <script src="assets/pages/dashborad.js"></script> --}}

@include('includes/footer_end')