
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="userId" content="{{ Auth::check() ? Auth::user->id : '' }}"> --}}
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('material/images/head-logo.png') }}">
    <title>Verifikasi Smelter SI</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('material/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('style')
    <!-- Custom CSS -->
    <link href="{{ asset('material/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('material/css/colors/megna.css') }}" id="theme" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>

<body class="fix-header fix-sidebar card-no-border">
    <div id="app">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="https://www.ptsi.co.id/">
                            <!-- Logo icon -->
                            <b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('material/images/head-logo.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ asset('material/images/head-logo.png') }}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span>
                            <!-- dark Logo text -->
                            <img src="{{ asset('material/images/head-logo.png') }}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->    
                            <img src="{{ asset('material/images/logo3.png') }}" class="light-logo" alt="homepage" /></span> </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
                            {{-- <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a> --}}
                                {{-- <div class="dropdown-menu scale-up-left">
                                    <ul class="mega-dropdown-menu row">
                                        <li class="col-lg-3 col-xlg-2 m-b-30">
                                            <h4 class="m-b-20">CAROUSEL</h4>
                                            <!-- CAROUSEL -->
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <div class="container"> <img class="d-block img-fluid" src="{{ asset('material/images/big/img1.jpg') }}" alt="First slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="{{ asset('material/images/big/img2.jpg') }}" alt="Second slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="{{ asset('material/images/big/img3.jpg') }}" alt="Third slide"></div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                            </div>
                                            <!-- End CAROUSEL -->
                                        </li>
                                        <li class="col-lg-3 m-b-30">
                                            <h4 class="m-b-20">ACCORDION</h4>
                                            <!-- Accordian -->
                                            <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Collapsible Group Item #1
                                                    </a>
                                                </h5> </div>
                                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Collapsible Group Item #2
                                                    </a>
                                                </h5> </div>
                                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Collapsible Group Item #3
                                                    </a>
                                                </h5> </div>
                                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-lg-3  m-b-30">
                                            <h4 class="m-b-20">CONTACT US</h4>
                                            <!-- Contact -->
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Enter email"> </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </form>
                                        </li>
                                        <li class="col-lg-3 col-xlg-4 m-b-30">
                                            <h4 class="m-b-20">List style</h4>
                                            <!-- List style -->
                                            <ul class="list-style-none">
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> --}}
                            {{-- </li> --}}
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                            @if(Sentinel::getUser()->roles()->first()->slug == 'client')
                            <notification v-bind:unreads="notifications" v-bind:userid="{{ Sentinel::getUser()->id}}"></notification>
                            @endif
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                    <ul>
                                        <li>
                                            <div class="drop-title">You have 4 new messages</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="{{ asset('material/images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="{{ asset('material/images/users/2.jpg') }}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="{{ asset('material/images/users/3.jpg') }}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="#">
                                                    <div class="user-img"> <img src="{{ asset('material/images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('material/images/admin.png') }}" alt="user" class="profile-pic" /></a>
                                <div class="dropdown-menu dropdown-menu-right scale-up">
                                    <ul class="dropdown-user">
                                        <li>
                                            <div class="dw-user-box">
                                                <div class="u-img"><img src="{{ asset('material/images/admin.png') }}" alt="user"></div>
                                                <div class="u-text">
                                                    <h4>Username : {{ Sentinel::getUser()->username }}</h4>
                                                    <p class="text-muted">{{ Sentinel::getUser()->name }}</p>
                                                    {{-- <a href="" class="btn btn-rounded btn-danger btn-sm">View Profile</a> --}}
                                                </div>
                                            </div>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="$(this).find('form').submit();"><i class="fa fa-power-off"></i> Logout
                                                <form action="{{ route('postLogout') }}" method="POST">
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                           
                            <!-- ============================================================== -->
                            <!-- Language -->
                            <!-- ============================================================== -->
                           
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- User profile -->
                    <div class="user-profile" style="background: url({{ asset('material/images/background/user-info.jpg') }}) no-repeat;">
                        <!-- User profile image -->
                        <div class="profile-img"> <img src="{{ asset('material/images/admin.png') }}" alt="user" /> </div>
                        <!-- User profile text-->
                        <div class="profile-text"> <a href="#" role="button" aria-haspopup="true" aria-expanded="true">{{ Sentinel::getUser()->name }}<span class="caret"></span></a>
                        </div>
                    </div>
                    <!-- End User profile text-->
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        @if(Sentinel::getUser()->roles()->first()->slug == 'superAdmin')
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">SUPERADMIN</li>
                            <li>
                                <a href="{{ route('superAdmin.dashboard') }}" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Admin</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.admin.create') }}">Add Admin</a></li>
                                    <li><a href="{{ route('superAdmin.admin.list') }}">List Admin</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Client</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.client.create') }}">Add Client</a></li>
                                    <li><a href="{{ route('superAdmin.client.list') }}">List Client</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Minerba</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('superAdmin.minerba.create') }}">Add Minerba</a></li>
                                    <li><a href="{{ route('superAdmin.minerba.list') }}">List Minerba</a></li>
                                </ul>
                            </li>
                        </ul>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'admin')
                            <ul id="sidebarnav">
                                <li class="nav-small-cap">Admin</li>
                                <li>
                                    <a href="{{ route('admin.dashboard')}}" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Dashboard</span></a>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pemesanan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('admin.order.addOffer')}}">Tambah Pemesanan</a></li>
                                        <li><a href="{{ route('admin.order.listOrder')}}"> List Pemesanan</a></li>
                                        <li><a href="{{ route('admin.order.addContract')}}"> Tambah Kontrak</a></li>
                                        <li><a href="{{ route('admin.order.listContract')}}">List Kontrak</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pertemuan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('admin.meeting.uploadBA')}}">Berita Acara</a></li>
                                        <li><a href="{{ route('admin.meeting.schedule')}}">Buat Pertemuan</a></li>
                                        <li><a href="{{ route('admin.meeting.listMeeting')}}">List Pertemuan</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pekerjaan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('admin.work.curvaS')}}">Kurva S</a></li>
                                        <li><a href="{{ route('admin.document.listDoc')}}">List Pekerjaan</a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pelaporan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('admin.report.addReport')}}">Tambah Laporan</a></li>
                                        <li><a href="{{ route('admin.report.listReport')}}">List Laporan</a></li>
                                        <li><a href="{{ route('admin.report.addReceipt')}}">Tambah Receipt</a></li>
                                        <li><a href="{{ route('admin.report.listReceipt')}}">List Receipt</a></li>
                                        <li><a href="{{ route('admin.report.addLetter')}}">Tambah Surat Pengatar</a></li>
                                        <li><a href="{{ route('admin.report.listLetter')}}">List Surat Pengantar</a></li>
                                        
                                    </ul>
                                </li>
                                {{-- <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Patient</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('admin.patient.create')}}">Add Patient</a></li>
                                        <li><a href="{{ route('admin.patient.list')}}">List Patient</a></li>
                                        
                                    </ul>
                                </li> --}}
                                
                                
                                
                                
                            </ul>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'minerba')
                        <ul id="sidebarnav">
                                <li class="nav-small-cap">Minerba</li>
                                <li>
                                    <a href="{{ route('minerba.dashboard')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('minerba.order.listSpk')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">SPK</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('minerba.meeting.listMeeting')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Meeting</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('minerba.report.listReport')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Laporan</span></a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('patient.registration.create')}}" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Registration</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('patient.registration.list')}}">History</a></li>
                                    </ul>
                                </li>
                                --}}
                                {{-- <li>
                                    <a href="{{ route('doctor.patient.list')}}" aria-expanded="false"><i class="fa fa-history"></i><span class="hide-menu">History</span></a>
                                </li> --}}
                                {{-- <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Registration</span></a> 
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('patient.registration.create')}}">Add Registration</a></li>
                                        <li><a href="{{ route('patient.registration.list')}}">History</a></li> --}}
                                        {{-- <li><a href="{{ route('patient.registration.list')}}">Diagnosis History</a></li> --}}
                                        {{-- <li>
                                            <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                                <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                                <li><a href="javascript:void(0)">item 1.3.4</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">item 1.4</a></li> --}}
                                    {{-- </ul>
                                </li> --}}
                                {{-- <li>
                                        <a class="" href="{{route('patient.prescription.confirm')}}" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Invoice</span></a> 
                                    
                                </li> --}}
                            </ul>
                        @elseif(Sentinel::getUser()->roles()->first()->slug == 'client')
                        {{-- ====================Real Doctor============================== --}}
                            <ul id="sidebarnav">
                                <li class="nav-small-cap"></li>
                                <li>
                                    <a href="{{ route('client.dashboard')}}" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Dashboard</span></a>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pemesanan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('client.order.uploadOffer', Sentinel::getUser()->id)}}">Surat Permintaan</a></li>
                                        <li><a href="{{ route('client.order.listDp', Sentinel::getUser()->id )}}">Pembayaran DP</a></li>
                                        <li><a href="{{ route('client.offer.listOrder', Sentinel::getUser()->id)}}">Surat Penawaran</a></li>
                                        <li><a href="{{ route('client.order.listOrder')}}">List Pemesanan</a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pertemuan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('client.meeting.listBA')}}">List Berita Acara</a></li>
                                        <li><a href="{{ route('client.meeting.listMeeting')}}">Jadwal Pertemuan</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pekerjaan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('client.work.addCurva',Sentinel::getUser()->id)}}">Tambah Kurva S</a></li>
                                        <li><a href="{{ route('client.work.listCurvaS',Sentinel::getUser()->id)}}">List Kurva S</a></li>
                                        <li><a href="{{ route('client.document.listOrder',Sentinel::getUser()->id)}}">Dokumen Pendukung</a></li>
                                        <li><a href="{{ route('client.document.listDoc',Sentinel::getUser()->id)}}">List Dokumen</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Pelaporan</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="{{ route('client.report.listReport')}}">List Laporan</a></li>
                                        <li><a href="{{ route('client.report.listReceipt')}}">List Receipt</a></li>
                                        <li><a href="{{ route('client.report.listLetter')}}">List Surat Pengantar</a></li>
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                        @endif
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
                <!-- Bottom points-->
              
                <!-- End Bottom points-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    @yield('breadcumb')
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    @yield('content')
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer">
                    © 2018 Surveyor Indonesia
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- ============================================================== -->
    <script src="{{ asset('material/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('material/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('material/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('material/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('material/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('material/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('material/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('material/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('material/js/custom.min.js') }}"></script>
    @yield('script')
</body>

</html>