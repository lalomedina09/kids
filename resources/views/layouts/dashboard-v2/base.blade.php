<!DOCTYPE html>
<html lang="en">
    <head>

        @include('partials.dashboard-v2.title-meta')

        @include('partials.dashboard-v2.head-css')

    </head>

    @include('partials.dashboard-v2.body')

        <!-- Begin page -->
        <div id="wrapper">


            @include('partials.dashboard-v2.topbar-dark')

            {{--@include('partials.dashboard-v2.left-sidebar')--}}
            @include('partials.dashboard-v2.horizontal')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                            <!--
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                            <li class="breadcrumb-item active">Horizontal Layout</li>
                                            -->
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard Panoramico</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-4">Total Revenue</h4>

                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                                       data-bgColor="#F9B9B9" value="58"
                                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                       data-thickness=".15"/>
                                            </div>

                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 256 </h2>
                                                <p class="text-muted mb-1">Revenue today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                        <div class="widget-box-2">
                                            <div class="widget-detail-2 text-end">
                                                <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 8451 </h2>
                                                <p class="text-muted mb-3">Revenue today</p>
                                            </div>
                                            <div class="progress progress-bar-alt-success progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 77%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-4">Statistics</h4>

                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                                        data-bgColor="#FFE6BA" value="80"
                                                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                        data-thickness=".15"/>
                                            </div>
                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 4569 </h2>
                                                <p class="text-muted mb-1">Revenue today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                        <div class="widget-box-2">
                                            <div class="widget-detail-2 text-end">
                                                <span class="badge bg-pink rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 158 </h2>
                                                <p class="text-muted mb-3">Revenue today</p>
                                            </div>
                                            <div class="progress progress-bar-alt-pink progress-sm">
                                                <div class="progress-bar bg-pink" role="progressbar"
                                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 77%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0">Daily Sales</h4>

                                        <div class="widget-chart text-center">
                                            <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                                            <ul class="list-inline chart-detail-list mb-0">
                                                <li class="list-inline-item">
                                                    <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>Series A</h5>
                                                </li>
                                                <li class="list-inline-item">
                                                    <h5 style="color: #5b69bc;"><i class="fa fa-circle me-1"></i>Series B</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mt-0">Statistics</h4>
                                        <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mt-0">Total Revenue</h4>
                                        <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-lg me-3">
                                                <img src="{{ asset('/dashboard-v2/images/users/user-3.jpg')}}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1">Chadengle</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-warning"><b>Admin</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-lg me-3">
                                                <img src="{{ asset('/dashboard-v2/images/users/user-2.jpg')}}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1"> Michael Zenaty</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-pink"><b>Support Lead</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-lg me-3">
                                                <img src="{{ asset('/dashboard-v2/images/users/user-1.jpg')}}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1">Stillnotdavid</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-success"><b>Designer</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-lg me-3">
                                                <img src="{{ asset('/dashboard-v2/images/users/user-10.jpg')}}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1">Tomaslau</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-info"><b>Developer</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mb-3">Inbox</h4>

                                        <div class="inbox-widget">

                                            <div class="inbox-item">
                                                <a href="#">
                                                    <div class="inbox-item-img"><img src="{{ asset('dashboard-v2/images/users/user-1.jpg')}}" class="rounded-circle" alt=""></div>
                                                    <h5 class="inbox-item-author mt-0 mb-1">Chadengle</h5>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <p class="inbox-item-date">13:40 PM</p>
                                                </a>
                                            </div>

                                            <div class="inbox-item">
                                                <a href="#">
                                                    <div class="inbox-item-img"><img src="{{ asset('dashboard-v2/images/users/user-2.jpg')}}" class="rounded-circle" alt=""></div>
                                                    <h5 class="inbox-item-author mt-0 mb-1">Tomaslau</h5>
                                                    <p class="inbox-item-text">I've finished it! See you so...</p>
                                                    <p class="inbox-item-date">13:34 PM</p>
                                                </a>
                                            </div>

                                            <div class="inbox-item">
                                                    <a href="#">
                                                    <div class="inbox-item-img"><img src="{{ asset('dashboard-v2/images/users/user-3.jpg')}}" class="rounded-circle" alt=""></div>
                                                    <h5 class="inbox-item-author mt-0 mb-1">Stillnotdavid</h5>
                                                    <p class="inbox-item-text">This theme is awesome!</p>
                                                    <p class="inbox-item-date">13:17 PM</p>
                                                </a>
                                            </div>

                                            <div class="inbox-item">
                                                <a href="#">
                                                    <div class="inbox-item-img"><img src="{{ asset('dashboard-v2/images/users/user-4.jpg')}}" class="rounded-circle" alt=""></div>
                                                    <h5 class="inbox-item-author mt-0 mb-1">Kurafire</h5>
                                                    <p class="inbox-item-text">Nice to meet you</p>
                                                    <p class="inbox-item-date">12:20 PM</p>
                                                </a>
                                            </div>

                                            <div class="inbox-item">
                                                <a href="#">
                                                    <div class="inbox-item-img"><img src="{{ asset('dashboard-v2/images/users/user-5.jpg')}}" class="rounded-circle" alt=""></div>
                                                    <h5 class="inbox-item-author mt-0 mb-1">Shahedk</h5>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <p class="inbox-item-date">10:15 AM</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Latest Projects</h4>

                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Adminto Admin v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge bg-danger">Released</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Adminto Frontend v1</td>
                                                        <td>01/01/2017</td>
                                                        <td>26/04/2017</td>
                                                        <td><span class="badge bg-success">Released</span></td>
                                                        <td>Adminto admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Adminto Admin v1.1</td>
                                                        <td>01/05/2017</td>
                                                        <td>10/05/2017</td>
                                                        <td><span class="badge bg-pink">Pending</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Adminto Frontend v1.1</td>
                                                        <td>01/01/2017</td>
                                                        <td>31/05/2017</td>
                                                        <td><span class="badge bg-purple">Work in Progress</span>
                                                        </td>
                                                        <td>Adminto admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Adminto Admin v1.3</td>
                                                        <td>01/01/2017</td>
                                                        <td>31/05/2017</td>
                                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                                        <td>Coderthemes</td>
                                                    </tr>

                                                    <tr>
                                                        <td>6</td>
                                                        <td>Adminto Admin v1.3</td>
                                                        <td>01/01/2017</td>
                                                        <td>31/05/2017</td>
                                                        <td><span class="badge bg-primary">Coming soon</span></td>
                                                        <td>Adminto admin</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                        </div>
                        <!-- end row -->
                        <!------------|||||||||||||||||||||||||||||||||||||||||||||||||------------->
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end ">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-4">Total Revenue</h4>

                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                                       data-bgColor="#F9B9B9" value="58"
                                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                       data-thickness=".15"/>
                                            </div>

                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 256 </h2>
                                                <p class="text-muted mb-1">Revenue today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-4">Statistics</h4>

                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                                       data-bgColor="#FFE6BA" value="80"
                                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                       data-thickness=".15"/>
                                            </div>
                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 4569 </h2>
                                                <p class="text-muted mb-1">Revenue today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->


                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-4">Total Revenue</h4>

                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#35b8e0 "
                                                       data-bgColor="#B8E6F4" value="77"
                                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                       data-thickness=".15"/>
                                            </div>

                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 8545 </h2>
                                                <p class="text-muted mb-1">Revenue today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->


                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-4">Statistics</h4>

                                        <div class="widget-chart-1">
                                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#10c469"
                                                       data-bgColor="#AAE2C6" value="65"
                                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                       data-thickness=".15"/>
                                            </div>
                                            <div class="widget-detail-1 text-end">
                                                <h2 class="fw-normal pt-2 mb-1"> 3562 </h2>
                                                <p class="text-muted mb-1">Revenue today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                        <div class="widget-box-2">
                                            <div class="widget-detail-2 text-end">
                                                <span class="badge bg-pink rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 158 </h2>
                                                <p class="text-muted mb-3">Revenue today</p>
                                            </div>
                                            <div class="progress progress-bar-alt-pink progress-sm">
                                                <div class="progress-bar bg-pink" role="progressbar"
                                                     aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 77%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                        <div class="widget-box-2">
                                            <div class="widget-detail-2 text-end">
                                                <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 8451 </h2>
                                                <p class="text-muted mb-3">Revenue today</p>
                                            </div>
                                            <div class="progress progress-bar-alt-success progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 77%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                        <div class="widget-box-2">
                                            <div class="widget-detail-2 text-end">
                                                <span class="badge bg-primary rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 7540 </h2>
                                                <p class="text-muted mb-3">Revenue today</p>
                                            </div>
                                            <div class="progress progress-bar-alt-primary progress-sm">
                                                <div class="progress-bar progress-bar-primary" role="progressbar"
                                                     aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 77%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                        <div class="widget-box-2 text-end">
                                            <div class="widget-detail-2">
                                                <span class="badge bg-warning rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                                <h2 class="fw-normal mb-1"> 9841 </h2>
                                                <p class="text-muted mb-3">Revenue today</p>
                                            </div>
                                            <div class="progress progress-bar-alt-warning progress-sm">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                     aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 77%;">
                                                    <span class="visually-hidden">77% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-lg me-3 flex-shrink-0">
                                                <img src="{{ asset('dashboard-v2/images/users/user-3.jpg') }}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1">Chadengle</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-warning"><b>Admin</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-lg me-3 flex-shrink-0">
                                                <img src="{{ asset('dashboard-v2/images/users/user-2.jpg') }}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1"> Michael Zenaty</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-pink"><b>Support Lead</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-lg me-3 flex-shrink-0">
                                                <img src="{{ asset('dashboard-v2/images/users/user-1.jpg') }}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1">Stillnotdavid</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-success"><b>Designer</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-lg me-3 flex-shrink-0">
                                                <img src="{{ asset('dashboard-v2/images/users/user-10.jpg') }}" class="img-fluid rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="mt-0 mb-1">Tomaslau</h5>
                                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                                <small class="text-info"><b>Developer</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h2 class="fw-normal text-primary" data-plugin="counterup">6599</h2>
                                            <h5>Statistics</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h2 class="fw-normal text-pink" data-plugin="counterup">5894</h2>
                                            <h5>Total Revenue</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h2 class="fw-normal text-warning" data-plugin="counterup">452</h2>
                                            <h5>Sales Analytics</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body widget-user">
                                        <div class="text-center">
                                            <h2 class="fw-normal text-info" data-plugin="counterup">1254</h2>
                                            <h5>Daily Sales</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3">Team Members</h4>

                                        <ul class="list-group mb-0 user-list">
                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user avatar-sm float-start me-2">
                                                        <img src="{{ asset('dashboard-v2/images/users/user-2.jpg') }}" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="user-desc">
                                                        <h5 class="name mt-0 mb-1">Michael Zenaty</h5>
                                                        <p class="desc text-muted mb-0 font-12">CEO</p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user avatar-sm float-start me-2">
                                                        <img src="{{ asset('dashboard-v2/images/users/user-3.jpg') }}" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="user-desc">
                                                        <h5 class="name mt-0 mb-1">James Neon</h5>
                                                        <p class="desc text-muted mb-0 font-12">Web Designer</p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user avatar-sm float-start me-2">
                                                        <img src="{{ asset('dashboard-v2/images/users/user-5.jpg') }}" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="user-desc">
                                                        <h5 class="name mt-0 mb-1">John Smith</h5>
                                                        <p class="desc text-muted mb-0 font-12">Web Developer</p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user avatar-sm float-start me-2">
                                                        <img src="{{ asset('dashboard-v2/images/users/user-6.jpg') }}" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="user-desc">
                                                        <h5 class="name mt-0 mb-1">Michael Zenaty</h5>
                                                        <p class="desc text-muted mb-0 font-12">Programmer</p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user avatar-sm float-start me-2">
                                                        <img src="{{ asset('dashboard-v2/images/users/user-1.jpg') }}" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="user-desc">
                                                        <h5 class="name mt-0 mb-1">Mat Helme</h5>
                                                        <p class="desc text-muted mb-0 font-12">Manager</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="text-center card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ asset('dashboard-v2/images/users/user-9.jpg') }}" class="rounded-circle avatar-xl img-thumbnail mb-3" alt="profile-image">

                                            <p class="text-muted font-13 mb-4">
                                                Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                                            </p>

                                            <div class="text-start">
                                                <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan Deo</span></p>

                                                <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123 1234</span></p>

                                                <p class="text-muted font-13"><strong>Email :</strong> <span class="ms-2">coderthemes@gmail.com</span></p>

                                                <p class="text-muted font-13 m-b-5"><strong>Location :</strong> <span class="ms-2">USA</span></p>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-4">Progressbars</h4>

                                        <h5 class="mt-0">iMacs <span class="text-primary float-end">80%</span></h5>
                                        <div class="progress progress-bar-alt-primary progress-sm mt-0 mb-3">
                                            <div class="progress-bar bg-primary progress-animated wow animated animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: visible; animation-name: animationProgress;">
                                            </div><!-- /.progress-bar .progress-bar-danger -->
                                        </div><!-- /.progress .no-rounded -->

                                        <h5 class="mt-0">iBooks <span class="text-pink float-end">50%</span></h5>
                                        <div class="progress progress-bar-alt-pink progress-sm mt-0 mb-3">
                                            <div class="progress-bar bg-pink progress-animated wow animated animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; visibility: visible; animation-name: animationProgress;">
                                            </div><!-- /.progress-bar .progress-bar-pink -->
                                        </div><!-- /.progress .no-rounded -->

                                        <h5 class="mt-0">iPhone 5s <span class="text-info float-end">70%</span></h5>
                                        <div class="progress progress-bar-alt-info progress-sm mt-0 mb-3">
                                            <div class="progress-bar bg-info progress-animated wow animated animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%; visibility: visible; animation-name: animationProgress;">
                                            </div><!-- /.progress-bar .progress-bar-info -->
                                        </div><!-- /.progress .no-rounded -->

                                        <h5 class="mt-0">iPhone 6 <span class="text-warning float-end">65%</span></h5>
                                        <div class="progress progress-bar-alt-warning progress-sm mt-0 mb-3">
                                            <div class="progress-bar bg-warning progress-animated wow animated animated" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%; visibility: visible; animation-name: animationProgress;">
                                            </div><!-- /.progress-bar .progress-bar-warning -->
                                        </div><!-- /.progress .no-rounded -->

                                        <h5 class="mt-0">iPhone 4 <span class="text-danger float-end">65%</span></h5>
                                        <div class="progress progress-bar-alt-danger progress-sm mt-0 mb-3">
                                            <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%; visibility: visible; animation-name: animationProgress;">
                                            </div><!-- /.progress-bar .progress-bar-warning -->
                                        </div><!-- /.progress .no-rounded -->

                                        <h5 class="mt-0">iPhone 6s <span class="text-success float-end">40%</span></h5>
                                        <div class="progress progress-bar-alt-success progress-sm mt-0">
                                            <div class="progress-bar bg-success progress-animated wow animated animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%; visibility: visible; animation-name: animationProgress;">
                                            </div><!-- /.progress-bar .progress-bar-success -->
                                        </div><!-- /.progress .no-rounded -->


                                    </div>
                                </div>

                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>

                                        <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all me-1"></i> Upcoming Reminders</h4>

                                        <ul class="list-group mb-0 user-list">
                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user float-start me-3">
                                                        <i class="mdi mdi-circle text-primary"></i>
                                                    </div>
                                                    <div class="user-desc overflow-hidden">
                                                        <h5 class="name mt-0 mb-1">Meet Manager</h5>
                                                        <span class="desc text-muted font-12 text-truncate d-block">February 24, 2019 - 10:30am to 12:45pm</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user float-start me-3">
                                                        <i class="mdi mdi-circle text-success"></i>
                                                    </div>
                                                    <div class="user-desc overflow-hidden">
                                                        <h5 class="name mt-0 mb-1">Project Discussion</h5>
                                                        <span class="desc text-muted font-12 text-truncate d-block">February 25, 2019 - 10:30am to 12:45pm</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user float-start me-3">
                                                        <i class="mdi mdi-circle text-pink"></i>
                                                    </div>
                                                    <div class="user-desc overflow-hidden">
                                                        <h5 class="name mt-0 mb-1">Meet Manager</h5>
                                                        <span class="desc text-muted font-12 text-truncate d-block">February 26, 2019 - 10:30am to 12:45pm</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user float-start me-3">
                                                        <i class="mdi mdi-circle text-muted"></i>
                                                    </div>
                                                    <div class="user-desc overflow-hidden">
                                                        <h5 class="name mt-0 mb-1">Project Discussion</h5>
                                                        <span class="desc text-muted font-12 text-truncate d-block">February 27, 2019 - 10:30am to 12:45pm</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="list-group-item">
                                                <a href="#" class="user-list-item">
                                                    <div class="user float-start me-3">
                                                        <i class="mdi mdi-circle text-danger"></i>
                                                    </div>
                                                    <div class="user-desc overflow-hidden">
                                                        <h5 class="name mt-0 mb-1">Meet Manager</h5>
                                                        <span class="desc text-muted font-12 text-truncate d-block">February 28, 2019 - 10:30am to 12:45pm</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->
                        <!------------|||||||||||||||||||||||||||||||||||||||||||||||||------------->
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                @include('partials.dashboard-v2.footer')

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        @include('partials.dashboard-v2.right-sidebar')

        @include('partials.dashboard-v2.vendor')

        <!-- knob plugin -->
        <script src="{{ asset('/dashboard-v2/libs/jquery-knob/jquery.knob.min.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('/dashboard-v2/libs/morris.js06/morris.min.js')}}"></script>
        <script src="{{ asset('/dashboard-v2/libs/raphael/raphael.min.js')}}"></script>

        <!-- Dashboar init js-->
        <script src="{{ asset('/dashboard-v2/js/pages/dashboard.init.js')}}"></script>

        <!-- App js-->
        <script src="{{ asset('/dashboard-v2/js/app.min.js')}}"></script>

    </body>
</html>
