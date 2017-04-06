<?php if ( ! defined('ABSPATH')) exit; ?>

				<!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                        <p class="text-muted page-title-alt">Seja bem-vindo ao painel <span class="text-white">i</span><span class="text-success">Grana</span>!</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <div class="bg-icon bg-icon-primary pull-left">
                                <i class="md md-attach-money text-primary"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">31,570</b></h3>
                                <p class="text-muted">Total Revenue</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-pink pull-left">
                                <i class="md md-add-shopping-cart text-pink"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">280</b></h3>
                                <p class="text-muted">Today's Sales</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-info pull-left">
                                <i class="md md-equalizer text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">0.16</b>%</h3>
                                <p class="text-muted">Conversion</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-success pull-left">
                                <i class="md md-remove-red-eye text-success"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">64,570</b></h3>
                                <p class="text-muted">Today's Visits</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0 m-b-30">Total Revenue</h4>

                            <div class="widget-chart text-center">
                                <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#2dc4b9" data-bgColor="#505A66" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                                <h5 class="text-muted m-t-20">Total sales made today</h5>
                                <h2 class="font-600">$75</h2>
                                <ul class="list-inline m-t-15">
                                    <li>
                                        <h5 class="text-muted m-t-20">Target</h5>
                                        <h4 class="m-b-0">$1000</h4>
                                    </li>
                                    <li>
                                        <h5 class="text-muted m-t-20">Last week</h5>
                                        <h4 class="m-b-0">$523</h4>
                                    </li>
                                    <li>
                                        <h5 class="text-muted m-t-20">Last Month</h5>
                                        <h4 class="m-b-0">$965</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">Sales Analytics</h4>
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>Mobiles</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="morris-bar-stacked" style="height: 303px;"></div>
                        </div>
                    </div>



                </div>
                <!-- end row -->


                <div class="row">

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">Total Sales</h4>

                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #ebeff2;"></i>Mobiles</h5>
                                    </li>
                                </ul>
                            </div>

                            <div id="morris-area-with-dotted" style="height: 300px;"></div>

                        </div>

                    </div>

                    <!-- col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light">View All</a>
                            <h4 class="text-dark header-title m-t-0">Recent Activities</h4>
                            <p class="text-muted m-b-30 font-13">
                                Your awesome text goes here. Yeah !!
                            </p>

                            <div class="nicescroll p-20" style="height: 295px;">
                                <div class="timeline-2">
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted"><small>5 minutes ago</small></div>
                                            <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted"><small>30 minutes ago</small></div>
                                            <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted"><small>59 minutes ago</small></div>
                                            <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted"><small>5 minutes ago</small></div>
                                            <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted"><small>30 minutes ago</small></div>
                                            <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                        </div>
                                    </div>

                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted"><small>59 minutes ago</small></div>
                                            <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                            <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->