<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Vikkand - {{$title}}</title>

    <link rel="icon" href="{{ URL::asset('assets/img/sketch.png')}}">

    <!-- Vendor stylesheet files. REQUIRED -->
    <!-- BEGIN: Vendor  -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/vendor.css')}}">
    <!-- END: core stylesheet files -->

    <!-- Plugin stylesheet files. OPTIONAL -->

    <!-- <link rel="stylesheet" href="{{ URL::asset('assets/vendor/jqvmap/jqvmap.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/dragula/dragula.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}"> -->

    <!-- END: plugin stylesheet files -->

    <!-- Theme main stlesheet files. REQUIRED -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/chl.css')}}">
    <link id="theme-list" rel="stylesheet" href="{{ URL::asset('assets/css/theme-peter-river.css')}}">
    <!-- END: theme main stylesheet files -->

    <!-- begin pace.js  -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/pace/themes/blue/pace-theme-minimal.css')}}">
    <script src="{{ URL::asset('assets/vendor/pace/pace.js')}}"></script>
    @if ($indexurl === 1)
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    @endif @if ($indexurl === 2)
    <style>
        th,td {
            padding: 15px;
            text-align: left;
        }
    </style>
    @endif @if ($indexurl === 3)

    @endif @if ($indexurl === 4)

    @endif @if ($indexurl === 5)

    @endif @if ($indexurl === 6)

    @endif @if ($indexurl === 6)
    <style>
        th,td {
            padding: 15px;
            text-align: left;
        }
    </style>
    @endif
    <!-- END: pace.js  -->

</head>

<body>
    <!-- begin .app -->
    <div class="app">
        <!-- begin .app-wrap -->
        <div class="app-wrap">
            <!-- begin .app-heading -->
            <header class="app-heading">
                <header class="canvas is-fixed is-top bg-white p-v-15 shadow-4dp" id="top-search">

                    <div class="container-fluid">
                        <div class="input-group input-group-lg icon-before-input">
                            <input type="text" class="form-control input-lg b-0" placeholder="Search for...">
                            <div class="icon z-3">
                                <i class="fa fa-fw fa-lg fa-search"></i>
                            </div>
                            <span class="input-group-btn">
                                <button data-target="#top-search" data-toggle="canvas" class="btn btn-danger btn-line b-0">
                                    <i class="fa fa-fw fa-lg fa-times"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>

                </header>
                <!-- begin .navbar -->
                <nav class="navbar navbar-default navbar-static-top shadow-2dp">
                    <!-- begin .navbar-header -->
                    <div class="navbar-header">
                        <!-- begin .navbar-header-left with image -->
                        <div class="navbar-header-left b-r">
                            <!--begin logo-->
                            <a class="logo" href="../index.html">
                                <span class="logo-xs visible-xs">
                                    <img src="{{ URL::asset('assets/img/logo_xs.svg')}}" alt="logo-xs">
                                </span>
                                <span class="logo-lg hidden-xs">
                                    <img src="{{ URL::asset('assets/img/logo_lg.svg')}}" alt="logo-lg">
                                </span>
                            </a>
                            <!--end logo-->
                        </div>
                        <!-- END: .navbar-header-left with image -->
                        <nav class="nav navbar-header-nav">

                            <a class="visible-xs b-r" href="#" data-side=collapse>
                                <i class="fa fa-fw fa-bars"></i>
                            </a>

                            <a class="hidden-xs b-r" href="#" data-side=mini>
                                <i class="fa fa-fw fa-bars"></i>
                            </a>
                        </nav>

                        <ul class="nav navbar-header-nav m-l-a">
                            <li class="dropdown b-3">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if ($selectedSurvei->bulan == '01' )
                                    <span class="">Triwulan I - {{$selectedSurvei->tahun}}</span>
                                    @elseif ($selectedSurvei->bulan == '02' )
                                    <span class="">Triwulan II - {{$selectedSurvei->tahun}}</span>
                                    @elseif ($selectedSurvei->bulan == '03' )
                                    <span class="">Triwulan III - {{$selectedSurvei->tahun}}</span>
                                    @elseif ($selectedSurvei->bulan == '04' )
                                    <span class="">Triwulan IV - {{$selectedSurvei->tahun}}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu pull-right w-sm animated fadeInUp">
                                    @foreach ($listSurvei as $item)
                                    <li class="p-a-5" class="row">
                                        <a href="{{ url('/survei/select/'.$item->uid) }}">
                                            @if ($item->bulan == '01' )
                                            <span class="">Triwulan I - {{$item->tahun}}</span>
                                            @elseif ($item->bulan == '02' )
                                            <span class="">Triwulan II - {{$item->tahun}}</span>
                                            @elseif ($item->bulan == '03' )
                                            <span class="">Triwulan III - {{$item->tahun}}</span>
                                            @elseif ($item->bulan == '04' )
                                            <span class="">Triwulan IV - {{$item->tahun}}</span>
                                            @endif
                                        </a>
                                    </li>
                                    @endforeach
                                    <li role="separator" class="divider"></li>
                                    <li class="text-center">
                                        <a href="{{ url('/survei/new') }}">
                                            Tambah Periode
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown b-l">
                                <a class="dropdown-toggle profile-pic" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::user()->photo==null)
                                    <img class="img-circle" src="{{ URL::asset('assets/img/m1.svg')}}" alt="{{Auth::user()->nama}}">
                                    @else
                                    <img class="img-circle" src="{{ URL::asset('img/user/'.Auth::user()->photo)}}" alt="{{Auth::user()->nama}}">
                                    @endif
                                    <b class="hidden-xs hidden-sm">{{Auth::user()->nama}}</b>
                                </a>
                                <ul class="dropdown-menu animated flipInY pull-right">
                                    <!-- <li>
                                        <a href="#">Profile</a>
                                    </li>
                                    <li role="separator" class="divider"></li> -->
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <i class="fa fa-fw fa-sign-out"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END: .navbar-header -->
                </nav>
                <!-- END: .navbar -->
            </header>
            <!-- END:  .app-heading -->

            <!-- begin .app-container -->
            <div class="app-container">

                <!-- begin .app-side -->
                <aside class="app-side">
                    <!-- begin .side-content -->
                    <div class="side-content">
                        <!-- begin user-panel -->
                        <div class="user-panel">
                            <div class="user-image">
                                <a href="#">
                                    @if (Auth::user()->photo==null)
                                    <img class="img-circle" src="{{ URL::asset('assets/img/m1.svg')}}" alt="{{Auth::user()->nama}}">
                                    @else
                                    <img class="img-circle" src="{{ URL::asset('img/user/'.Auth::user()->photo)}}" alt="{{Auth::user()->nama}}">
                                    @endif
                                </a>
                            </div>
                            <div class="user-info">
                                <h5>{{Auth::user()->nama}}</h5>
                                <ul class="nav">
                                    <li class="dropdown">
                                        <a href="#" class="text-turquoise small dropdown-toggle bg-transparent" data-toggle="dropdown">
                                            <i class="fa fa-fw fa-circle">
                                            </i> {{Auth::user()->jabatan}}
                                        </a>
                                        <ul class="dropdown-menu animated flipInY pull-right">
                                            <!-- <li>
                                                <a href="#">Profile</a>
                                            </li>
                                            <li role="separator" class="divider"></li> -->
                                            <li>
                                                <a href="{{ route('logout') }}">
                                                    <i class="fa fa-fw fa-sign-out"></i> Logout
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END: user-panel -->
                        <!-- begin .side-nav -->
                        <nav class="side-nav">
                            <!-- BEGIN: nav-content -->
                            <ul class="metismenu nav nav-inverse nav-bordered nav-stacked" data-plugin="metismenu">
                                <li class="nav-header">MAIN</li>

                                <li>
                                    @if ($indexurl !== 1 )
                                    <a href="{{ url('/home') }}">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-cogs"></i>
                                        </span>
                                        <span class="nav-title">Dashboard</span>
                                    </a>
                                    @else
                                    <a href="javascript:;" class="active">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-cogs"></i>
                                        </span>
                                        <span class="nav-title">Dashboard</span>
                                    </a>
                                    @endif
                                </li>
                                <li class="nav-divider"></li>
                                @if ($selectedSurvei->isStart  == '0' )
                                <li class="nav-header">Persiapan</li>

                                <!-- BEGIN: chart -->
                                <li>
                                    <a href="javascript:;">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </span>
                                        <span class="nav-title">Kuesioner</span>
                                    </a>
                                    <ul class="nav nav-sub nav-stacked">
                                        <li>
                                            @if ($indexurl !== 2 || $indexkues != 1)
                                            <a href="{{ url('/kuesioner/1') }}">Toko Bangunan</a>
                                            @else
                                            <a class="active" href="javascript:;">Toko Bangunan</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($indexurl !== 2 || $indexkues != 2)
                                            <a href="{{ url('/kuesioner/2') }}">Bahan Material</a>
                                            @else
                                            <a class="active" href="javascript:;">Bahan Material</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($indexurl !== 2 || $indexkues != 3 )
                                            <a href="{{ url('/kuesioner/3') }}">Toko Kayu/Kuseng</a>
                                            @else
                                            <a class="active" href="javascript:;">Toko Kayu/Kuseng</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($indexurl !== 2 || $indexkues != 4 )
                                            <a href="{{ url('/kuesioner/4') }}">Toko Kaca</a>
                                            @else
                                            <a class="active" href="javascript:;">Toko Kaca</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($indexurl !== 2 || $indexkues != 5 )
                                            <a href="{{ url('/kuesioner/5') }}">Sewa Alat Berat</a>
                                            @else
                                            <a class="active" href="javascript:;">Sewa Alat Berat</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($indexurl !== 2 || $indexkues != 6 )
                                            <a href="{{ url('/kuesioner/6') }}">Toko Aluminium</a>
                                            @else
                                            <a class="active" href="javascript:;">Toko Aluminium</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($indexurl !== 2 || $indexkues != 7 )
                                            <a href="{{ url('/kuesioner/7') }}">Upah Jasa Konstruksi</a>
                                            @else
                                            <a class="active" href="javascript:;">Upah Jasa Konstruksi</a>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    @if ($indexurl !== 3 )
                                    <a href="{{ url('/responden') }}">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-address-book"></i>
                                        </span>
                                        <span class="nav-title">Responden</span>
                                    </a>
                                    @else
                                    <a class="active" href="javascript:;">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-address-book"></i>
                                        </span>
                                        <span class="nav-title">Responden</span>
                                    </a>
                                    @endif
                                </li>
                                <li>
                                    @if ($indexurl !== 4 )
                                    <a href="{{ url('/petugas') }}">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-address-card"></i>
                                        </span>
                                        <span class="nav-title">Petugas</span>
                                    </a>
                                    @else
                                    <a class="active" href="javascript:;">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-address-card"></i>
                                        </span>
                                        <span class="nav-title">Petugas</span>
                                    </a>
                                    @endif
                                </li>
                                @endif
                                @if ($selectedSurvei->isStart  == '1' )
                                <li class="nav-header">Pelaksanaan</li>
                                <li>
                                    @if ($indexurl !== 5 )
                                    <a href="{{ url('/progress') }}">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-bar-chart"></i>
                                        </span>
                                        <span class="nav-title">Progress</span>
                                    </a>
                                    @else
                                    <a class="active" href="javascript:;">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-bar-chart"></i>
                                        </span>
                                        <span class="nav-title">Progress</span>
                                    </a>
                                    @endif
                                </li>
                                <li>
                                    @if ($indexurl !== 6 )
                                    <a href="{{ url('/pemeriksaan') }}">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-list"></i>
                                        </span>
                                        <span class="nav-title">Pemeriksaan</span>
                                    </a>
                                    @else
                                    <a class="active" href="javascript:;">
                                        <span class="nav-icon">
                                            <i class="fa fa-fw fa-list"></i>
                                        </span>
                                        <span class="nav-title">Pemeriksaan</span>
                                    </a>
                                    @endif
                                </li>
                                @endif
                                <li class="nav-divider"></li>


                            </ul>
                            <!-- END: nav-content -->
                        </nav>
                        <!-- END: .side-nav -->
                    </div>
                    <!-- END: .side-content -->
                    <!-- begin .side-footer -->
                    <footer class="side-footer p-h-15 p-t-15 p-b-10">
                        <div class="progress is-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                style="width: 60%;">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                        <div class="progress is-xs">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                style="width: 40%;">
                                <span class="sr-only">40% Complete</span>
                            </div>
                        </div>
                    </footer>
                    <!-- END: .side-footer -->
                </aside>
                <!-- END: .app-side -->

                <!-- begin side-collapse-visible bar -->
                <div class="side-visible-line hidden-xs" data-side="collapse">
                    <i class="fa fa-caret-left"></i>
                </div>
                <!-- begin side-collapse-visible bar -->

                <!-- begin .app-main -->
                <div class="app-main">
                    <!-- begin .main-content -->
                    <div class="main-content bg-clouds">

                        <!-- begin .container-fluid -->
                        <div class="container-fluid p-t-15">
                            @yield('content')
                        </div>
                    </div>
                    <footer class="main-footer bg-white p-a-5">
                        main footer
                    </footer>
                </div>
            </div>
            <footer class="app-footer p-t-10 text-white">
                <div class="container-fluid">
                    <p class="text-center small">
                        Copyright chl v0.1.1 &copy; 2017
                    </p>
                </div>
            </footer>
        </div>
    </div>

    <span class="fa fa-angle-up" id="totop" data-plugin="totop"></span>

    <!-- Vendor javascript files. REQUIRED -->
    <script src="{{ URL::asset('assets/js/vendor.js')}}"></script>
    <!-- END: End javascript files -->

    <!-- Plugin javascript files. OPTIONAL -->

    <!-- <script src="{{ URL::asset('assets/vendor/waypoints/jquery.waypoints.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/counterup/jquery.counterup.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/jqvmap/jquery.vmap.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/jqvmap/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

    <script src="{{ URL::asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.jquery.js')}}"></script>

    <script src="{{ URL::asset('assets/vendor/dragula/dragula.js')}}"></script>

    <script src="{{ URL::asset('assets/vendor/chart.js/Chart.js')}}"></script>

    <script src="{{ URL::asset('assets/vendor/tablesorter/js/jquery.tablesorter.js')}}"></script> -->

    <!-- END: plugin javascript files -->

    <!-- Demo javascript files. NOT REQUIRED -->

    <!-- END: demo javascript files -->

    <script src="{{ URL::asset('assets/js/chl.js')}}"></script>
    <script src="{{ URL::asset('assets/js/chl-demo.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <script>
        var urlbase = "{{$urlbase}}";
        var idKues = "{{$indexkues}}";
        //alert(urlbase);

    </script>
    <script src="{{ URL::asset('js/all.js')}}"></script>
    @if ($indexurl === 1)
    <script src="{{ URL::asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('js/dashboard.js')}}"></script>
    @endif @if ($indexurl === 2 && ($indexkues != '7' && $indexkues != '5'))
    <script src="{{ URL::asset('js/kuesioner1.js')}}"></script>
    <script>
        //alert(1);
        var listItemBlueprint = <?php echo json_encode($itemBlueprint); ?>;
        listItemBlueprint = JSON.parse(JSON.stringify(listItemBlueprint));
        //alert(listPetugas);
        arrange();
        loadHTML();
    </script>
    @endif @if ($indexurl === 2 &&  ($indexkues == '7' || $indexkues == '5'))
    <script src="{{ URL::asset('js/kuesioner2.js')}}"></script>
    <script>
        //alert(1);
        var listItemBlueprint = <?php echo json_encode($itemBlueprint); ?>;
        listItemBlueprint = JSON.parse(JSON.stringify(listItemBlueprint));
        //alert(listPetugas);
        arrange();
        loadHTML();
    </script>
    @endif @if ($indexurl === 3)
    <script src="{{ URL::asset('js/responden.js')}}"></script>
    <script>
        //alert(1);
        var listResponden = <?php echo json_encode($listResponden); ?>;
        listResponden = JSON.parse(JSON.stringify(listResponden));
        //alert(listPetugas);
        loadHTML();
    </script>
    @endif @if ($indexurl === 4)
    <script src="{{ URL::asset('js/petugas.js')}}"></script>
    <script>
        //alert(1);
        var listPetugas = <?php echo json_encode($listPetugas); ?>;
        listPetugas = JSON.parse(JSON.stringify(listPetugas));
        //alert(listPetugas);
        loadHTML();
    </script>
    @endif @if ($indexurl === 5)
    <script src="{{ URL::asset('js/progress.js')}}"></script>
    <script>
        //alert(1);
        var listProgress = <?php echo json_encode($progress); ?>;
        listProgress = JSON.parse(JSON.stringify(listProgress));
        var listPetugas = <?php echo json_encode($listPetugas); ?>;
        listPetugas = JSON.parse(JSON.stringify(listPetugas));
        console.log(JSON.stringify(listProgress))
        loadHTML();
    </script>
    @endif @if ($indexurl === 6)
    <script src="{{ URL::asset('js/pemeriksa.js')}}"></script>
    <script>
        //alert(1);
        var listPetugas = <?php echo json_encode($listPetugas); ?>;
        listPetugas = JSON.parse(JSON.stringify(listPetugas));
        var listResponden = <?php echo json_encode($listResponden); ?>;
        listResponden = JSON.parse(JSON.stringify(listResponden));
        var listRespondenTipe1 = <?php echo json_encode($listRespondenTipe1); ?>;
        listRespondenTipe1 = JSON.parse(JSON.stringify(listRespondenTipe1));
        var listRespondenTipe2 = <?php echo json_encode($listRespondenTipe2); ?>;
        listRespondenTipe12 = JSON.parse(JSON.stringify(listRespondenTipe2));

        arrange();
        loadHTML1();
        loadHTML2();
        loadHTML3();
        loadHTML4();
        loadHTML5();
        loadHTML6();
        loadHTML7();
        //console.log(JSON.stringify(listProgress))
        //loadHTML();
    </script>
    @endif

</body>

</html>
