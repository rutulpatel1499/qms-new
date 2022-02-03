@extends('common.mainpage')
@section('title')
<title>user</title>
@endsection
@section('content')


<main class="admin-main">
    <!--site header begins-->
 <header class="admin-header">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

    <nav class=" mr-auto my-auto">
        <ul class="nav align-items-center">

            <li class="nav-item">
                <a class="nav-link  " data-target="#siteSearchModal" data-toggle="modal" href="#">
                    <i class=" mdi mdi-magnify mdi-24px align-middle"></i>
                </a>
            </li>
        </ul>
    </nav>
    <nav class=" ml-auto">
        <ul class="nav align-items-center">

            <li class="nav-item">
                <div class="dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-24px mdi-bell-outline"></i>
                        <span class="notification-counter"></span>
                    </a>

                    <div class="dropdown-menu notification-container dropdown-menu-right">
                        <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                            <a href="#!" class="mdi mdi-18px mdi-settings text-muted"></a>
                            <span class="h5 m-0">Notifications</span>
                            <a href="#!" class="mdi mdi-18px mdi-notification-clear-all text-muted"></a>
                        </div>
                        <div class="notification-events bg-gray-300">
                            <div class="text-overline m-b-5">today</div>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"> <i class="mdi mdi-circle text-success"></i> All systems operational.</div>
                                </div>
                            </a>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"> <i class="mdi mdi-upload-multiple "></i> File upload successful.</div>
                                </div>
                            </a>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body">
                                        <i class="mdi mdi-cancel text-danger"></i> Your holiday has been denied
                                    </div>
                                </div>
                            </a>


                        </div>

                    </div>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#"   role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <span class="avatar-title rounded-circle bg-dark">R</span>

                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right"   >
                    <a class="dropdown-item" href="#">  Add Account
                    </a>
                    <a class="dropdown-item" href="#">  Reset Password</a>
                    <a class="dropdown-item" href="#">  Help </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}"> Logout</a>
                </div>
            </li>

        </ul>

    </nav>
</header>
<!--site header ends -->    
<section class="admin-content">
        <div class="container p-t-20">
            <div class="row">
            @foreach(['success', 'danger'] as $key)
                @if(Session::has($key))
                <div class="alert alert-{{ $key }} alert-block">
                <button type="button" class="close" data-dismiss='alert'>x</button>
                {{ Session::get($key) }}
                </div>
                @endif
            @endforeach
                <div class="col-12 m-b-30">
                    <h3>Project Dashboard</h3>
                </div>
                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h3> Overview</h3>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <div id="chart-09"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <h2>Project Status </h2>
                                    <p class="text-muted">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet cumque cupiditate deserunt
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <div style="  overflow: hidden;
                                        max-height: 210px!important">
                                        <div id="chart-07"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!--widget card begin-->
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col my-auto">
                                            <div class="h6 text-muted ">Media Reach </div>
                                        </div>

                                        <div class="col-auto my-auto">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle badge-soft-danger"><i
                                                            class="mdi mdi-heart  "></i></div>

                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="display-4 fw-600">16k</h1>
                                    <div class="h6">
                                        <span class="text-success"> <i class="mdi mdi-arrow-top-right"></i> +0.65% </span>
                                        More activity than usual.
                                    </div>
                                </div>
                            </div>
                            <!--widget card ends-->

                        </div>
                        <div class="col-lg-6">
                            <!--widget card begin-->
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col my-auto">
                                            <div class="h6 text-muted ">New Modules </div>
                                        </div>

                                        <div class="col-auto my-auto">
                                            <div class="avatar">
                                                <div class="avatar-title rounded-circle bg-soft-primary"><i
                                                            class="mdi mdi-script  "></i></div>

                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="display-4 fw-600">120</h1>
                                    <div class="h6">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> +0.65% </span>
                                        Less activity than usual.
                                    </div>
                                </div>
                            </div>
                            <!--widget card ends-->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-body">
                            <div class="card-header">
                                <h3 class=" m-b-0">Tickets</h3>

                                <div class="card-controls">

                                    <a href="#" class="js-card-fullscreen icon"></a>
                                    <a href="#" class="js-card-refresh icon"></a>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                                    class="icon mdi  mdi-dots-vertical"></i> </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                            <button class="dropdown-item" type="button">Something else here</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="chart-08"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!--widget card begin-->
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="card-title"><i class="mdi mdi-18px text-info mdi-circle"></i> Project Status
                            </div>

                            <div class="card-controls">

                                <a href="#" class="js-card-refresh icon"> </a>
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon mdi  mdi-dots-vertical"></i> </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="text-center ">
                                <img src="assets/img/logos/mailchimp.jpg" class="rounded-circle" width="80" alt="">
                            </div>
                            <h4 class="text-center m-t-20">
                                Branding & Product Design
                            </h4>
                            <div class="text-muted text-center m-b-20">
                                5 Members
                            </div>
                            <div class="text-center m-b-30">
                                <div class=" avatar-group ">
                                    <div class="avatar avatar-sm">
                                        <img src="assets/img/users/user-5.jpg" class="avatar-img rounded-circle"
                                             alt="">
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <img src="assets/img/users/user-4.jpg" class="avatar-img rounded-circle"
                                             alt="">
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <div class="avatar-title rounded-circle bg-warning">A</div>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <div class="avatar-title rounded-circle bg-accent">X</div>
                                    </div>

                                    <div class="avatar avatar-sm">
                                        <div class="avatar-title rounded-circle bg-danger">N</div>
                                    </div>
                                    <div class="avatar avatar-sm">
                                        <div class="avatar-title rounded-circle"><i class="mdi mdi-plus"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center p-b-20">
                                <button class="btn btn-primary">View Project</button>
                            </div>
                        </div>
                    </div>
                    <!--widget card ends-->


                </div>
                <div class="col-lg-4">
                    <!--widget card begin-->
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title m-b-0">People </h5>

                            <div class="card-controls">
    
                                <a href="#" class="js-card-fullscreen icon"></a>
                                <a href="#" class="js-card-refresh icon"></a>
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                                class="icon mdi  mdi-dots-vertical"></i> </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group list-group-flush ">


                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img src="assets/img/users/user-1.jpg"
                                                                        class="avatar-img avatar-sm rounded-circle"
                                                                        alt=""></div>
                                </div>
                                <div class="">
                                    <div>Alex Johnson</div>
                                    <div class="text-muted">Visual Designer
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <a href="#" class="btn  btn-white">Follow</a>
                                </div>

                            </div>

                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img src="assets/img/users/user-2.jpg"
                                                                        class="avatar-img avatar-sm rounded-circle"
                                                                        alt=""></div>
                                </div>
                                <div class="">
                                    <div>Beckett Brown</div>
                                    <div class="text-muted">Project Manager
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <a href="#" class="btn  btn-white">Follow</a>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img src="assets/img/users/user-3.jpg"
                                                                        class="avatar-img avatar-sm rounded-circle"
                                                                        alt=""></div>
                                </div>
                                <div class="">
                                    <div>Brielle Cote</div>
                                    <div class="text-muted">Web Developer
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <a href="#" class="btn  btn-white">Follow</a>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img src="assets/img/users/user-4.jpg"
                                                                        class="avatar-img avatar-sm rounded-circle"
                                                                        alt=""></div>
                                </div>
                                <div class="">
                                    <div>Liam Lévesque</div>
                                    <div class="text-muted">Product Designer
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <a href="#" class="btn  btn-white">Follow</a>
                                </div>

                            </div>
                            <div class="list-group-item d-flex  align-items-center">
                                <div class="m-r-20">
                                    <div class="avatar avatar-sm "><img src="assets/img/users/user-5.jpg"
                                                                        class="avatar-img avatar-sm rounded-circle"
                                                                        alt=""></div>
                                </div>
                                <div class="">
                                    <div>Parker Roy</div>
                                    <div class="text-muted">Visual Designer
                                    </div>
                                </div>

                                <div class="ml-auto">
                                    <a href="#" class="btn  btn-white">Follow</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--widget card ends-->

                </div>
                <div class="col-lg-4">
                    <!--widget card begin-->
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title m-b-0">Costing Slabs</h5>

                            <div class="card-controls">

                                <a href="#" class="js-card-fullscreen icon"></a>
                                <a href="#" class="js-card-refresh icon"></a>
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                                class="icon mdi  mdi-dots-vertical"></i> </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button">Action</button>
                                        <button class="dropdown-item" type="button">Another action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">

                            <div class="p-t-15 p-b-15  border-bottom border-bottom-dashed">
                                <div class="row ">
                                    <div class="col-md-7">
                                        <h6 class="">Project Budget
                                        </h6>
                                        <p class="text-muted m-0 ">
                                            Includes Tax and other liabilities

                                        </p>
                                    </div>
                                    <div class="col-md-5 my-auto  text-right">
                                        <h4 class="text-primary m-0">$5900</h4>

                                    </div>
                                </div>

                            </div>
                            <div class="p-t-15 p-b-15  border-bottom border-bottom-dashed">
                                <div class="row ">
                                    <div class="col-md-7">
                                        <h6 class="">Hosting Costs</h6>
                                        <p class="text-muted m-0 ">
                                            Server and CDN Hosting
                                        </p>
                                    </div>
                                    <div class="col-md-5 my-auto  text-right">
                                        <h4 class="text-success m-0">$563</h4>

                                    </div>
                                </div>

                            </div>
                            <div class="p-t-15 p-b-15  border-bottom border-bottom-dashed">
                                <div class="row ">
                                    <div class="col-md-7">
                                        <h6 class="">Payments</h6>
                                        <p class="text-muted m-0 ">
                                            Infrastructure and Rent
                                        </p>
                                    </div>
                                    <div class="col-md-5 my-auto  text-right">
                                        <h4 class="text-danger m-0">$720</h4>

                                    </div>
                                </div>

                            </div>

                            <div class="p-t-15 p-b-15  ">
                                <div class="row ">
                                    <div class="col-md-7">
                                        <h6 class="">Logistics</h6>
                                        <p class="text-muted m-0 ">
                                            Overall Regional Logistics

                                        </p>
                                    </div>
                                    <div class="col-md-5 my-auto  text-right">
                                        <h4 class="text-danger m-0">-15%</h4>

                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                    <!--widget card ends-->

                </div>
            </div>
        </div>
    </section>

</main>

<div class="modal modal-slide-left  fade" id="siteSearchModal" tabindex="-1" role="dialog" aria-labelledby="siteSearchModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body p-all-0" id="site-search">
                <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="form-dark bg-dark text-white p-t-60 p-b-20 bg-dots" >
                    <h3 class="text-uppercase    text-center  fw-300 "> Search</h3>

                    <div class="container-fluid">
                        <div class="col-md-10 p-t-10 m-auto">
                            <input type="search" placeholder="Search Something"
                                   class=" search form-control form-control-lg">

                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-dark text-muted container-fluid p-b-10 text-center text-overline">
                        results
                    </div>
                    <div class="list-group list  ">


                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm "><img class="avatar-img rounded-circle"   src="assets/img/users/user-3.jpg" alt="user-image"></div>
                            </div>
                            <div class="">
                                <div class="name">Eric Chen</div>
                                <div class="text-muted">Developer</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm "><img class="avatar-img rounded-circle"
                                                                    src="assets/img/users/user-4.jpg" alt="user-image"></div>
                            </div>
                            <div class="">
                                <div class="name">Sean Valdez</div>
                                <div class="text-muted">Marketing</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm "><img class="avatar-img rounded-circle"
                                                                    src="assets/img/users/user-8.jpg" alt="user-image"></div>
                            </div>
                            <div class="">
                                <div class="name">Marie Arnold</div>
                                <div class="text-muted">Developer</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar-title bg-dark rounded"><i class="mdi mdi-24px mdi-file-pdf"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">SRS Document</div>
                                <div class="text-muted">25.5 Mb</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar-title bg-dark rounded"><i
                                                class="mdi mdi-24px mdi-file-document-box"></i></div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">Design Guide.pdf</div>
                                <div class="text-muted">9 Mb</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar avatar-sm  ">
                                        <div class="avatar-title bg-primary rounded"><i
                                                    class="mdi mdi-24px mdi-code-braces"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">response.json</div>
                                <div class="text-muted">15 Kb</div>
                            </div>


                        </div>
                        <div class="list-group-item d-flex  align-items-center">
                            <div class="m-r-20">
                                <div class="avatar avatar-sm ">
                                    <div class="avatar avatar-sm ">
                                        <div class="avatar-title bg-info rounded"><i
                                                    class="mdi mdi-24px mdi-file-excel"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="name">June Accounts.xls</div>
                                <div class="text-muted">6 Mb</div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

</div>

@endsection
