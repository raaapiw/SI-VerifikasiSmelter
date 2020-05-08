
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('material/images/iconSI.ico')}}">
    <title>Verifikasi Smelter Surveyor Indonesia</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('material/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('material/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('material/css/style1.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('material/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- Slide Show CSS-->
    {{-- <style>
        .cb-slideshow,
        .cb-slideshow:after { 
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            z-index: 0; 
        }
        .cb-slideshow:after { 
            content: '';
            background: transparent url(../images/pattern.png) repeat top left; 
        }
        .cb-slideshow li span { 
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        left: 0px;
        color: transparent;
        background-size: cover;
        background-position: 50% 50%;
        background-repeat: none;
        opacity: 0;
        z-index: 0;
        animation: imageAnimation 36s linear infinite 0s; 
        }
        .cb-slideshow li:nth-child(1) span { 
            background-image: url({{ asset('material/images/background/masker.jpg')}}) 
        }
        .cb-slideshow li:nth-child(2) span { 
            background-image: url(../images/2.jpg);
            animation-delay: 6s; 
        }
        .cb-slideshow li:nth-child(3) span { 
            background-image: url(../images/3.jpg);
            animation-delay: 12s; 
        }
        .cb-slideshow li:nth-child(4) span { 
            background-image: url(../images/4.jpg);
            animation-delay: 18s; 
        }
        .cb-slideshow li:nth-child(5) span { 
            background-image: url(../images/5.jpg);
            animation-delay: 24s; 
        }
        .cb-slideshow li:nth-child(6) span { 
            background-image: url(../images/6.jpg);
            animation-delay: 30s; 
        }

        .cb-slideshow li:nth-child(2) div { 
            animation-delay: 6s; 
        }
        .cb-slideshow li:nth-child(3) div { 
            animation-delay: 12s; 
        }
        .cb-slideshow li:nth-child(4) div { 
            animation-delay: 18s; 
        }
        .cb-slideshow li:nth-child(5) div { 
            animation-delay: 24s; 
        }
        .cb-slideshow li:nth-child(6) div { 
            animation-delay: 30s; 
        }

        @keyframes imageAnimation { 
            0% { opacity: 0; animation-timing-function: ease-in; }
            8% { opacity: 1; animation-timing-function: ease-out; }
            17% { opacity: 1 }
            25% { opacity: 0 }
            100% { opacity: 0 }
        }
        
    </style> --}}
    <!-- End Slide Show CSS-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss  background-size: 1360px 768px;-->
    <!-- ============================================================== -->
    {{-- style="background-image:url({{ asset('material/images/background/2.jpg')}}); min-height: 100%;min-width: 1024px;width: 100%;height: auto;" --}}
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{ asset('material/images/background/2.jpg')}}); min-height: 100%;min-width: 1024px;width: 100%;height: auto;">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="{{ route('postLogin') }}" method="POST">                    
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('material/images/si3.jpg')}}" width="76px" alt="Home" />
                        </div>
                        <div class="col-5">
                            
                        </div>
                        <div class="col-3">
                            <img width="90px" src="{{ asset('material/images/logobumn.png')}}" alt="Home" />
                        </div>
                    </div>
                    <div>
                        <br>
                        <h1 style="text-align:center; font-weight: bold; font-family: 'Ubuntu', serif;">VERIFIKASI SMELTER</h1>
                    </div>   
                    @if(session('error'))
                    <div class="form-group m-t-30">
                        <div class="col-xs-12">
                            <div class="alert alert-danger"> {{ session()->get('error') }} </div>
                        </div>
                    </div>
                    @endif                                     
                    <h3 class="box-title m-b-20 {{ session('error') ? 'm-t-10' : 'm-t-40' }}">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="username" type="text" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Lupa Password <a href="https://api.whatsapp.com/send?phone=6285330851507&text=Halo%20admin%20Verifikasi%20Smelter%20PTSI,%20" target="__blank" class="text-primary m-l-5"><b>Hubungi admin.</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('material/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('material/plugins/popper/popper.min.js')}}"></script>
    <script src="{{ asset('material/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('material/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('material/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('material/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{ asset('material/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{ asset('material/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('material/js/custom.min.js')}}"></script>
    <script>
        $('.carousel').carousel({
        interval: 600,
        pause: "false"
        });
    </script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->

    {{--  <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>  --}}

    <script src="{{ asset('material/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

</body>

</html>