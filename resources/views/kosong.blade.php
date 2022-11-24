<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah</title>
    <link rel="icon" href="{{ URL::asset('assets/img/sketch.png')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/chl.css')}}">
    <link id="theme-list" rel="stylesheet" href="{{ URL::asset('assets/css/theme-peter-river.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/pace/themes/blue/pace-theme-minimal.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <script src="{{ URL::asset('assets/vendor/pace/pace.js')}}"></script>
</head>

<body class="container">
    <div class="">
        <div class="col" style="">
            <div class="box">
                <header class="bg-alizarin text-white">
                    <h4>Survei Baru</h4>
                    <!-- begin box-tools -->
                    <div class="box-tools">
                        <a class="fa fa-fw fa-minus" href="#" data-box="collapse"></a>
                        <a class="fa fa-fw fa-square-o" href="#" data-fullscreen="box"></a>
                    </div>
                    <!-- END: box-tools -->
                </header>
                <div class="box-body collapse in">
                    <form role="form" method="POST" action="{{ URL::asset('/survei/new')}}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="form-control-label">Tahun :</label>
                            <select class="form-control" data-plugin="select2" id="tahun" name="tahun" required>
                                <option value="2018"> 2018 </option>
                                <option value="2019"> 2019 </option>
                                <option value="2020"> 2020 </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Bulan :</label>
                            <select class="form-control" data-plugin="select2" id="bulan" name="bulan" required>
                                <option value="01">Triwulan I (Januari - Maret)</option>
                                <option value="02">Triwulan II (April - Juni)</option>
                                <option value="03">Triwulan III (Juli - September)</option>
                                <option value="04">Triwulan IV (Oktober - Desember)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Mulai :</label>
                            <input type="text" class="form-control datepicker" id="mulai" name="mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Akhir :</label>
                            <input type="text" class="form-control datepicker" id="akhir" name="akhir" required>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" data-dismiss="modal" id="save2">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{ URL::asset('assets/js/vendor.js')}}"></script>
<script src="{{ URL::asset('assets/js/chl.js')}}"></script>
<script src="{{ URL::asset('assets/js/chl-demo.js')}}"></script>
<script>
    var urlbase = "{{$urlbase}}";

</script>
<script src="{{ URL::asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
    //alert("asas");
    $(function () {
        $('#mulai').datepicker({
            format: 'dd/mm/yyyy',
            setDate: new Date(),
            autoclose: true
        });
        $('#akhir').datepicker({
            format: 'dd/mm/yyyy',
            setDate: new Date(),
            autoclose: true
        });
        $('#mulai').on('change', function(){
            changeStartFinish();
        });
        function changeStartFinish(){
            $('#akhir').datepicker("remove");
            $('#akhir').datepicker({
                format: 'dd/mm/yyyy',
                setDate: new Date(),
                autoclose: true,
                startDate: $('#mulai').val()
            });
        }
    });

</script>

</html>
