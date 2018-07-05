@include('includes/header_start')

        <!--Animate CSS -->
        <link href="assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css">

@include('includes/header_end')

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Animation</h3>
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

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Animation Effects</h4>
                                            <p class="text-muted m-b-30 font-14">Just-add-water CSS animations.</p>
            
                                            <div class="text-center">
                                                <div id="animationSandbox">
                                                    <img src="assets/images/logo_dark.png" alt="" class="center-block" height="36" >
                                                </div>
                                            </div>
            
                                            <form class="m-b-30 m-t-40">
                                                <div class="input-group">
            
                                                    <select class="form-control js--animations">
                                                        <optgroup label="Attention Seekers">
                                                            <option value="bounce">bounce</option>
                                                            <option value="flash">flash</option>
                                                            <option value="pulse">pulse</option>
                                                            <option value="rubberBand">rubberBand</option>
                                                            <option value="shake">shake</option>
                                                            <option value="swing">swing</option>
                                                            <option value="tada">tada</option>
                                                            <option value="wobble">wobble</option>
                                                            <option value="jello">jello</option>
                                                        </optgroup>
            
                                                        <optgroup label="Bouncing Entrances">
                                                            <option value="bounceIn">bounceIn</option>
                                                            <option value="bounceInDown">bounceInDown</option>
                                                            <option value="bounceInLeft">bounceInLeft</option>
                                                            <option value="bounceInRight">bounceInRight</option>
                                                            <option value="bounceInUp">bounceInUp</option>
                                                        </optgroup>
            
                                                        <optgroup label="Bouncing Exits">
                                                            <option value="bounceOut">bounceOut</option>
                                                            <option value="bounceOutDown">bounceOutDown</option>
                                                            <option value="bounceOutLeft">bounceOutLeft</option>
                                                            <option value="bounceOutRight">bounceOutRight</option>
                                                            <option value="bounceOutUp">bounceOutUp</option>
                                                        </optgroup>
            
                                                        <optgroup label="Fading Entrances">
                                                            <option value="fadeIn">fadeIn</option>
                                                            <option value="fadeInDown">fadeInDown</option>
                                                            <option value="fadeInDownBig">fadeInDownBig</option>
                                                            <option value="fadeInLeft">fadeInLeft</option>
                                                            <option value="fadeInLeftBig">fadeInLeftBig</option>
                                                            <option value="fadeInRight">fadeInRight</option>
                                                            <option value="fadeInRightBig">fadeInRightBig</option>
                                                            <option value="fadeInUp">fadeInUp</option>
                                                            <option value="fadeInUpBig">fadeInUpBig</option>
                                                        </optgroup>
            
                                                        <optgroup label="Fading Exits">
                                                            <option value="fadeOut">fadeOut</option>
                                                            <option value="fadeOutDown">fadeOutDown</option>
                                                            <option value="fadeOutDownBig">fadeOutDownBig</option>
                                                            <option value="fadeOutLeft">fadeOutLeft</option>
                                                            <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                                                            <option value="fadeOutRight">fadeOutRight</option>
                                                            <option value="fadeOutRightBig">fadeOutRightBig
                                                            </option>
                                                            <option value="fadeOutUp">fadeOutUp</option>
                                                            <option value="fadeOutUpBig">fadeOutUpBig</option>
                                                        </optgroup>
            
                                                        <optgroup label="Flippers">
                                                            <option value="flip">flip</option>
                                                            <option value="flipInX">flipInX</option>
                                                            <option value="flipInY">flipInY</option>
                                                            <option value="flipOutX">flipOutX</option>
                                                            <option value="flipOutY">flipOutY</option>
                                                        </optgroup>
            
                                                        <optgroup label="Lightspeed">
                                                            <option value="lightSpeedIn">lightSpeedIn</option>
                                                            <option value="lightSpeedOut">lightSpeedOut</option>
                                                        </optgroup>
            
                                                        <optgroup label="Rotating Entrances">
                                                            <option value="rotateIn">rotateIn</option>
                                                            <option value="rotateInDownLeft">rotateInDownLeft
                                                            </option>
                                                            <option value="rotateInDownRight">rotateInDownRight
                                                            </option>
                                                            <option value="rotateInUpLeft">rotateInUpLeft</option>
                                                            <option value="rotateInUpRight">rotateInUpRight
                                                            </option>
                                                        </optgroup>
            
                                                        <optgroup label="Rotating Exits">
                                                            <option value="rotateOut">rotateOut</option>
                                                            <option value="rotateOutDownLeft">rotateOutDownLeft
                                                            </option>
                                                            <option value="rotateOutDownRight">
                                                                rotateOutDownRight
                                                            </option>
                                                            <option value="rotateOutUpLeft">rotateOutUpLeft
                                                            </option>
                                                            <option value="rotateOutUpRight">rotateOutUpRight
                                                            </option>
                                                        </optgroup>
            
                                                        <optgroup label="Sliding Entrances">
                                                            <option value="slideInUp">slideInUp</option>
                                                            <option value="slideInDown">slideInDown</option>
                                                            <option value="slideInLeft">slideInLeft</option>
                                                            <option value="slideInRight">slideInRight</option>
            
                                                        </optgroup>
                                                        <optgroup label="Sliding Exits">
                                                            <option value="slideOutUp">slideOutUp</option>
                                                            <option value="slideOutDown">slideOutDown</option>
                                                            <option value="slideOutLeft">slideOutLeft</option>
                                                            <option value="slideOutRight">slideOutRight</option>
            
                                                        </optgroup>
            
                                                        <optgroup label="Zoom Entrances">
                                                            <option value="zoomIn">zoomIn</option>
                                                            <option value="zoomInDown">zoomInDown</option>
                                                            <option value="zoomInLeft">zoomInLeft</option>
                                                            <option value="zoomInRight">zoomInRight</option>
                                                            <option value="zoomInUp">zoomInUp</option>
                                                        </optgroup>
            
                                                        <optgroup label="Zoom Exits">
                                                            <option value="zoomOut">zoomOut</option>
                                                            <option value="zoomOutDown">zoomOutDown</option>
                                                            <option value="zoomOutLeft">zoomOutLeft</option>
                                                            <option value="zoomOutRight">zoomOutRight</option>
                                                            <option value="zoomOutUp">zoomOutUp</option>
                                                        </optgroup>
            
                                                        <optgroup label="Specials">
                                                            <option value="hinge">hinge</option>
                                                            <option value="rollIn">rollIn</option>
                                                            <option value="rollOut">rollOut</option>
                                                        </optgroup>
                                                    </select>
            
                                                          <span class="input-group-append">
                                                            <button class="btn btn-primary js--triggerAnimation"
                                                                    type="button">Animate Me !
                                                            </button>
                                                          </span>
                                                </div>
                                                <!-- /input-group -->
            
            
                                            </form>
            
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

@include('includes/footer_start')

        <!-- Animation js init(Demo purpose only)-->
        <script src="assets/pages/animate-init.js"></script>

@include('includes/footer_end')