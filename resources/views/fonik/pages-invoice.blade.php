@include('includes/header_start')

@include('includes/header_end')

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Invoice</h3>
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
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="invoice-title">
                                                        <h4 class="pull-right font-16"><strong>Order # 12345</strong></h4>
                                                        <h3 class="mt-0">
                                                            <img src="assets/images/logo_dark.png" alt="logo" height="26"/>
                                                        </h3>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <address>
                                                                <strong>Billed To:</strong><br>
                                                                John Smith<br>
                                                                1234 Main<br>
                                                                Apt. 4B<br>
                                                                Springfield, ST 54321
                                                            </address>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <address>
                                                                <strong>Shipped To:</strong><br>
                                                                Kenny Rigdon<br>
                                                                1234 Main<br>
                                                                Apt. 4B<br>
                                                                Springfield, ST 54321
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 m-t-30">
                                                            <address>
                                                                <strong>Payment Method:</strong><br>
                                                                Visa ending **** 4242<br>
                                                                jsmith@email.com
                                                            </address>
                                                        </div>
                                                        <div class="col-6 m-t-30 text-right">
                                                            <address>
                                                                <strong>Order Date:</strong><br>
                                                                October 7, 2016<br><br>
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="panel panel-default">
                                                        <div class="p-2">
                                                            <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                                        </div>
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <td><strong>Item</strong></td>
                                                                        <td class="text-center"><strong>Price</strong></td>
                                                                        <td class="text-center"><strong>Quantity</strong>
                                                                        </td>
                                                                        <td class="text-right"><strong>Totals</strong></td>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                    <tr>
                                                                        <td>BS-200</td>
                                                                        <td class="text-center">$10.99</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-right">$10.99</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>BS-400</td>
                                                                        <td class="text-center">$20.00</td>
                                                                        <td class="text-center">3</td>
                                                                        <td class="text-right">$60.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>BS-1000</td>
                                                                        <td class="text-center">$600.00</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-right">$600.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line text-center">
                                                                            <strong>Subtotal</strong></td>
                                                                        <td class="thick-line text-right">$670.99</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Shipping</strong></td>
                                                                        <td class="no-line text-right">$15</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Total</strong></td>
                                                                        <td class="no-line text-right"><h4 class="m-0">$685.99</h4></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
            
                                                            <div class="d-print-none">
                                                                <div class="pull-right">
                                                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                    <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                </div>
                                            </div> <!-- end row -->
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

@include('includes/footer_start')

@include('includes/footer_end')