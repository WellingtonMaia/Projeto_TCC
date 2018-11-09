<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('css/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <link rel="icon shortcut" type="image/gif" href="{{ asset('img/favicon.svg') }}">
        <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}"  rel="stylesheet" >
        <link href="{{ asset('css/jquery.fancybox.min.css') }}"  rel="stylesheet" >
        <link href="{{ asset('css/animate.css') }}"  rel="stylesheet" >
        <link href="{{ asset('css/spinners.css') }}"  rel="stylesheet" >
        <link href="{{ asset('css/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
        <link href="{{ asset('css/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')
            }} " rel="stylesheet">
            <script src="{{ asset('css/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
            <title>Easy Tools</title>

            
        </head>
        <body class="fix-header">
            <div class="shadow"></div>
            <div class="preloader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
            <div id="wrapper">
                <nav class="navbar navbar-default navbar-static-top m-b-0">
                    <div class="navbar-header">
                        <div class="top-left-part">
                            <a class="logo" href="{{route('home')}}">
                                <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 427 157.5" style="enable-background:new 0 0 427 157.5;" xml:space="preserve">
                                    <style type="text/css">
                                    .st0{opacity:0.93;fill:#49A5F5;}
                                    .st1{fill:#000;}
                                    </style>
                                    <image style="display:none;overflow:visible;opacity:0.93;" width="462" height="361" xlink:href="67DCFA95.jpg"  transform="matrix(0.9999 0 0 0.9999 -25.9711 -5.9774)">
                                    </image>
                                    <circle class="st0" cx="201.5" cy="21" r="16"/>
                                    <path class="st0" d="M145.3,57.3c0,0,13.5-16.3,61-15.8c38,0,46.5,13.8,46.5,13.8s-32.8,0-32.8,17.5s6.5,27.5,6.5,27.5
                                        s-6.3-7-16.3-6.5C192.8,94,173,134.8,165,135c0,0,29-48.8,27-65.3S173.3,52.3,145.3,57.3z"/>
                                        <g>
                                            <path class="st1" d="M43.8,123.6c-4.2,2.4-10.9,4.4-18.3,4.4c-14.7,0-21.1-10-21.1-22.3c0-16.7,12.4-35.6,30.3-35.6
                                                c10.6,0,16.3,6.3,16.3,14.2c0,14.6-16.4,18.4-36.9,18c-0.5,2.4-0.1,7.6,1.1,10.6c2.2,5,6.6,7.5,12.3,7.5c6.6,0,11.5-2,14.9-3.8
                                                L43.8,123.6z M33.2,77.5c-9.1,0-15.9,8.8-18.2,17.5c15,0.2,26.7-1.8,26.7-10.5C41.7,80,38.2,77.5,33.2,77.5z"/>
                                                <path class="st1" d="M85.6,126.8c0-3.3,0.5-8.6,1.2-14.3h-0.2c-6,11.5-13.7,15.6-21.5,15.6c-9.8,0-16-7.8-16-18.3
                                                    c0-19.3,14.2-39.7,38.4-39.7c5.3,0,11.1,0.9,15,2.1l-5.7,28.9c-1.8,9.7-2.6,19.6-2.3,25.7H85.6z M91.7,78.4
                                                    c-1.3-0.4-3.4-0.8-6.6-0.8C70.8,77.6,59.1,92.6,59,108c0,6.2,2.1,12.2,9.5,12.2c8,0,17.3-10.3,20.1-25.1L91.7,78.4z"/>
                                                    <path class="st1" d="M102.5,117.2c2.6,1.6,7.4,3.5,11.9,3.5c6.4,0,10.6-4.1,10.6-9.1c0-4.3-2-7-7.7-10.2c-6.4-3.6-10-8.5-10-14.1
                                                        c0-9.7,8.4-17.1,20.1-17.1c5,0,9.5,1.3,11.5,2.8l-2.7,7.2c-1.9-1.1-5.4-2.5-9.6-2.5c-5.8,0-9.9,3.6-9.9,8.3c0,4.1,2.7,6.6,7.6,9.3
                                                        c6.2,3.5,10.4,8.3,10.4,14.6c0,11.7-9.5,18.3-21.2,18.3c-6,0-11.3-1.9-13.8-3.8L102.5,117.2z"/>
                                                        <path class="st1" d="M150,71.3l5.5,29.8c1.2,6.4,2,10.5,2.5,14.6h0.3c1.5-3.6,3.1-7.4,5.9-13.6l14.2-30.9h10.1l-20.8,42.2
                                                            c-6,12-11.6,21.8-19.1,29.2c-6.2,6.2-13,8.9-16.1,9.6l-2.3-8.2c2.4-0.8,6.4-2.4,10.2-5.3c3.8-2.9,7.8-7.4,10.7-12.8
                                                            c0.5-0.9,0.4-1.6,0.3-2.5l-11.1-52.1H150z"/>
                                                        </g>
                                                        <g>
                                                            <path class="st1" d="M255.6,56.4l-2.9,14.9H266l-1.5,7.4h-13.3l-5.1,27c-0.6,3.1-1.1,6-1.1,8.9c0,3.3,1.6,5.4,5.3,5.4
                                                                c1.7,0,3.2-0.1,4.5-0.4l-0.5,7.5c-1.7,0.6-4.6,1-7.4,1c-8.4,0-11.7-5.1-11.7-10.8c0-3.2,0.4-6.4,1.2-10.4l5.4-28.1H234l1.4-7.4h8
                                                                l2.3-12.5L255.6,56.4z"/>
                                                                <path class="st1" d="M312.6,93.1c0,17.1-12.2,34.9-30.8,34.9c-13.9,0-21.7-10.3-21.7-22.8c0-18.3,12.7-35.2,30.8-35.2
                                                                    C305.8,70.1,312.6,81.4,312.6,93.1z M269.9,104.9c0,9,5,15.6,13.2,15.6c11.2,0,19.7-14.5,19.7-27.4c0-6.5-3-15.5-12.9-15.5
                                                                    C277.8,77.6,269.9,92.2,269.9,104.9z"/>
                                                                    <path class="st1" d="M366,93.1c0,17.1-12.2,34.9-30.8,34.9c-13.9,0-21.7-10.3-21.7-22.8c0-18.3,12.7-35.2,30.8-35.2
                                                                        C359.2,70.1,366,81.4,366,93.1z M323.3,104.9c0,9,5,15.6,13.2,15.6c11.2,0,19.7-14.5,19.7-27.4c0-6.5-3-15.5-12.9-15.5
                                                                        C331.2,77.6,323.3,92.2,323.3,104.9z"/>
                                                                        <path class="st1" d="M365.8,126.8l15.5-81.5h9.5l-15.6,81.5H365.8z"/>
                                                                        <path class="st1" d="M385.6,117.2c2.6,1.6,7.4,3.5,11.9,3.5c6.4,0,10.6-4.1,10.6-9.1c0-4.3-1.9-7-7.7-10.2c-6.4-3.6-10-8.5-10-14.1
                                                                            c0-9.7,8.4-17.1,20.1-17.1c5,0,9.5,1.3,11.5,2.8l-2.7,7.2c-1.9-1.1-5.4-2.5-9.6-2.5c-5.8,0-9.9,3.6-9.9,8.3c0,4.1,2.7,6.6,7.6,9.3
                                                                            c6.2,3.5,10.4,8.3,10.4,14.6c0,11.7-9.5,18.3-21.2,18.3c-6,0-11.3-1.9-13.8-3.8L385.6,117.2z"/>
                                                                        </g>
                                                                    </svg>
                                                                    {{-- <b>
                                                                    <img src="{{ asset('css/plugins/images/admin-logo.png') }}" alt="home" class="dark-logo" />
                                                                    <img src="{{ asset('css/plugins/images/admin-logo-dark.png') }}" alt="home" class="light-logo" />
                                                                    </b>
                                                                    <span class="hidden-xs">
                                                                        <img src="{{ asset('css/plugins/images/admin-text.png') }} " alt="home" class="dark-logo" />
                                                                        <img src="{{ asset('css/plugins/images/admin-text-dark.png') }}" alt="home" class="light-logo" />
                                                                    </span> --}}
                                                                </a>
                                                            </div>
                                                            <ul class="nav navbar-top-links navbar-right pull-right">
                                                                <li>
                                                                    <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                                                                        <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                                                                    </li>
                                                                    <li>
                                                                        <a class="profile-pic" href="{{ url('/users/show-info/'.Auth::user()->id) }}"> <img src="{{ url('storage/users/'.Auth::user()->image) }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </nav>
                                                        <div class="navbar-default sidebar" role="navigation">
                                                            <div class="sidebar-nav slimscrollsidebar">
                                                                <div class="sidebar-head">
                                                                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                                                                </div>
                                                                <ul class="nav" id="side-menu">
                                                                    <li style="padding: 70px 0 0;">
                                                                        <a href="{{route('home')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('projects')}}" class="waves-effect"><i class="fa fa-tasks fa-fw" aria-hidden="true"></i>Projetos</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('users')}}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Usuários</a>
                                                                    </li>
                                                                    {{-- <li>
                                                                        <a href="{{route('tasks')}}" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Tarefas</a>
                                                                    </li> --}}
                                                                    <li>
                                                                        <a href="{{route('financials')}}" class="waves-effect"><i class="fa fa-money fa-fw" aria-hidden="true"></i>Financeiro</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('report')}}" class="waves-effect"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>Relatórios</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="center p-20">
                                                                    {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger btn-block waves-effect waves-light">Upgrade to Pro</a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @yield('content')
                                                        <footer class="footer text-center">
                                                            © 2018 EasyTools
                                                        </footer>
                                                    </div>
                                                </div>
                                                
                                                
                                                <!-- Bootstrap Core JavaScript -->
                                                <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                                                <!-- Menu Plugin JavaScript -->
                                                <script src="{{ asset('css/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
                                                <!--slimscroll JavaScript -->
                                                <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
                                                <!--Wave Effects -->
                                                <script src="{{ asset('js/waves.js') }}"></script>

                                                <script src="{{ asset('js/easytimer.min.js') }}"></script>
                                                {{-- <script src="{{ asset('js/waves.js') }}"></script> --}}
                                                {{-- <script src="{{ asset('js/waves.js') }}"></script> --}}
                                                <!--Counter js -->
                                                <script src="{{ asset('css/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
                                                <script src="{{ asset('css/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
                                                <!-- chartist chart -->
                                                
                                                <script src="{{ asset('css/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
                                                <!-- Sparkline chart JavaScript -->
                                                <script src="{{ asset('css/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
                                                <!-- Custom Theme JavaScript -->
                                                <script src="{{ asset('js/custom.min.js') }}"></script>
                                                <script src="{{ asset('js/dashboard1.js') }}"></script>
                                                {{-- <script src="{{ asset('js/jquery.min.js') }}"></script>  --}}
                                                <script src="{{ asset('js/index.js') }}"></script>
                                                <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
                                                <script src="{{ asset('js/jquery.mask.js') }}"></script>
                                                <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
                                            </body>
                                        </html>