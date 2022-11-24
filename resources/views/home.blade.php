@extends('layouts.app2') @section('content')
<div class="box">
    <header class="bg-alizarin text-white">
        <h4>Mengenai Survei</h4>
        <!-- begin box-tools -->
        <div class="box-tools">
            <a class="fa fa-fw fa-minus" href="#" data-box="collapse"></a>
            <a class="fa fa-fw fa-square-o" href="#" data-fullscreen="box"></a>
        </div>
        <!-- END: box-tools -->
    </header>
    <div class="box-body collapse in">
        <table>
            <tbody class="border">
                <tr class="noborders" style="height: 40px;">
                    <td style="width:120px">Tahun</td>
                    <td>: {{$selectedSurvei->tahun}}</td>
                </tr>
                <tr class="noborders" style="height: 40px;">
                    <td style="width:120px">Triwulan</td>
                    <td>: {{$selectedSurvei->bulan}}</td>
                </tr>
                <tr class="noborders" style="height: 40px;">
                    <td style="width:120px">Mulai Survei</td>
                    <td>:
                        <span id="mulaiSpan">{{date('d/m/Y', strtotime($selectedSurvei->mulai))}}</span>
                    </td>
                </tr>
                <tr class="noborders" style="height: 40px;">
                    <td style="width:120px">Akhir Survei</td>
                    <td>:
                        <span id="akhirSpan">{{date('d/m/Y', strtotime($selectedSurvei->akhir))}}</span>
                    </td>
                </tr>
                <tr class="noborders" style="height: 40px;">
                    <td style="width:120px">Petugas</td>
                    <td>:
                        <span id="petugasSpin">{{$selectedSurvei->nippetugas}}</span>
                    </td>
                </tr>
                <tr class="noborders" style="height: 40px;">
                    <td style="width:120px">Pemeriksa</td>
                    <td>:
                        <span id="pemeriksaSpan">{{$selectedSurvei->nippemeriksa}}</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="alredyDiv">
            <button class="btn btn-success pull-right {{ $selectedSurvei->isStart == 1 ? 'hidden' : '' }}" id="mulaiButton" style="margin-left:15px;">Mulai</button>
            <button class="btn btn-primary pull-right {{ $selectedSurvei->isStart == 1 ? 'hidden' : '' }}" id="ubah" style="margin-left:15px;"
                data-toggle="modal" data-target="#ubahSurvei">Ubah</button>
            <button class="btn btn-success pull-right {{ $selectedSurvei->isStart != 1 ? 'hidden' : '' }}" id="kembaliButton" 
                style="margin-left:15px;" data-toggle="modal" data-target="#kembaliSurvei">Kembali</button>
            <button class="btn btn-danger pull-right" id="hapus" data-toggle="modal" data-target="#hapusSurvei">Hapus</button>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="ubahSurvei" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Ubah Survei
                        <span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ubahSuveiId" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Mulai :</label>
                            <input type="text" class="form-control datepicker" id="mulai" name="mulai" value="{{date('d/m/Y', strtotime($selectedSurvei->mulai))}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Akhir :</label>
                            <input type="text" class="form-control datepicker" id="akhir" name="akhir" value="{{date('d/m/Y', strtotime($selectedSurvei->akhir))}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Petugas :</label>
                            <select class="form-control" data-plugin="select2" id="petugas" name="petugas" required>
                                @foreach ($listUser as $item) @if($item->tipePengguna == '0')
                                <option value="{{ $item->nip }}"> {{$item->nama}} </option>
                                @endif @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Pemeriksa :</label>
                            <select class="form-control" data-plugin="select2" id="pemeriksa" name="pemeriksa" required>
                                @foreach ($listUser as $item) @if($item->tipePengguna == '1')
                                <option value="{{ $item->nip }}"> {{$item->nama}} </option>
                                @endif @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="hapusSurvei" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Hapus Survei
                        <span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="{{ url('/survei/delete') }}">
                    <div class="modal-body">
                        @if ($selectedSurvei->bulan == '01' )
                        <h6>Apakah anda yakin untuk menghapus survei indeks kemahalan konstruksi Triwulan I - {{$selectedSurvei->tahun}}?</h6>
                        @elseif ($selectedSurvei->bulan == '02' )
                        <h6>Apakah anda yakin untuk menghapus survei indeks kemahalan konstruksi Triwulan II - {{$selectedSurvei->tahun}}?</h6>
                        @elseif ($selectedSurvei->bulan == '03' )
                        <h6>Apakah anda yakin untuk menghapus survei indeks kemahalan konstruksi Triwulan III - {{$selectedSurvei->tahun}}?</h6>
                        @elseif ($selectedSurvei->bulan == '04' )
                        <h6>Apakah anda yakin untuk menghapus survei indeks kemahalan konstruksi Triwulan IV - {{$selectedSurvei->tahun}}?</h6>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="mulaiSurvei" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Mulai Survei
                        <span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="{{ url('/survei/start') }}">
                    <div class="modal-body">
                        @if ($selectedSurvei->bulan == '01' )
                        <h6>Apakah anda yakin untuk memulai survei indeks kemahalan konstruksi Triwulan I - {{$selectedSurvei->tahun}}?</h6>
                        @elseif ($selectedSurvei->bulan == '02' )
                        <h6>Apakah anda yakin untuk memulai survei indeks kemahalan konstruksi Triwulan II - {{$selectedSurvei->tahun}}?</h6>
                        @elseif ($selectedSurvei->bulan == '03' )
                        <h6>Apakah anda yakin untuk memulai survei indeks kemahalan konstruksi Triwulan III - {{$selectedSurvei->tahun}}?</h6>
                        @elseif ($selectedSurvei->bulan == '04' )
                        <h6>Apakah anda yakin untuk memulai survei indeks kemahalan konstruksi Triwulan IV - {{$selectedSurvei->tahun}}?</h6>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="kembaliSurvei" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Mulai Survei
                        <span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="{{ url('/survei/back') }}">
                    <div class="modal-body">
                        <h6>Apakah anda yakin untuk kembali ke masa persiapan survei, ini akan membuat semua data yang telah
                            masuk akan terhapus?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
