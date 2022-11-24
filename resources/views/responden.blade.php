@extends('layouts.app2') 
@section('content')
<div class="box">
    <header class="bg-alizarin text-white">
        <h4>Responden</h4>
        <!-- begin box-tools -->
        <div class="box-tools">
            <a class="fa fa-fw fa-minus" href="#" data-box="collapse"></a>
            <a class="fa fa-fw fa-square-o" href="#" data-fullscreen="box"></a>
        </div>
        <!-- END: box-tools -->
    </header>
    <div class="box-body collapse in">
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 100px;">Nama</th>
                    <th style="width: 90px;">username</th>
                    <th style="width: 10px;">Tipe</th>
                    <th style="width: 90px;">SelfEnum</th>
                    <th style="width: 90px;">Foto</th>
                    <th style="width: 90px;">NIP Petugas</th>
                    <th style="width: 90px;">Aksi</th>
                </tr>
            </thead>
            <tbody id="userContent">
               
            </tbody>
        </table>
        <div class="pull-right">
            <button type="button" class="btn btn-info addUser" id="addRespondeen">
                <i class="fa fa-plus"></i> Tambah Responden</button>
            <button type="button" class="btn btn-info addUser" id="addRespondeenBaru">
                <i class="fa fa-plus"></i> Tambah Responden Baru</button>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="tambahResponden" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Tambah Petugas Baru<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahRespondenId" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama :</label>
                            <input type="text" class="form-control datepicker" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">UserName :</label>
                            <input type="text" class="form-control datepicker" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Password :</label>
                            <input type="password" class="form-control datepicker" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Tipe Responden :</label>
                            <select class="form-control" data-plugin="select2" id="tipe" name="tipe" required>
                                <option value="1">Toko Bangunan</option>
                                <option value="2">Toko Bahan Material</option>
                                <option value="3">Kayu Kuseng</option>
                                <option value="4">Kaca</option>
                                <option value="5">Alat Berat</option>
                                <option value="6">Alumunium</option>
                                <option value="7">Upah Konstruksi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Self Enum :</label>
                            <select class="form-control" data-plugin="select2" id="selfEnum" name="selfEnum" required>
                                <option value="0" selected>Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="form-group hidden" id="nipPetugasGroup">
                            <label for="name" class="form-control-label">Petugas :</label>
                            <select class="form-control" data-plugin="select2" id="nipPetugas" name="nipPetugas">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Photo :</label>
                            <img id="photo1Hasil" src="storage/user/" alt=''>
                            <input type="file" class="form-control" id="photo1" name="photo1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save1" id="save1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="tambahRespondenLama" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Tambah Responden <span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahRespondenId2" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama Responden:</label>
                            <select class="form-control" data-plugin="select2" id="namaResponden2" name="namaResponden2" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Tipe Responden :</label>
                            <select class="form-control" data-plugin="select2" id="tipe2" name="tipe2" required>
                                <option value="1">Toko Bangunan</option>
                                <option value="2">Toko Bahan Material</option>
                                <option value="3">Kayu Kuseng</option>
                                <option value="4">Kaca</option>
                                <option value="5">Alat Berat</option>
                                <option value="6">Alumunium</option>
                                <option value="7">Upah Konstruksi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Self Enum :</label>
                            <select class="form-control" data-plugin="select2" id="selfEnum2" name="selfEnum2" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group hidden" id="nipPetugasGroup2">
                            <label for="name" class="form-control-label">Petugas :</label>
                            <select class="form-control" data-plugin="select2" id="nipPetugas2" name="nipPetugas2">
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save1" id="save1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="ubahResponden" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Ubah Responden<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ubahRespondenId" action="">
                    <div class="modal-body">
                    <div class="form-group">
                            <label for="name" class="form-control-label">Nama :</label>
                            <input type="text" class="form-control datepicker" id="nama3" name="nama3" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                ubah password
                            </label>
                        </div>
                        <div class="form-group hidden" id="ubahPass">
                            <label for="name" class="form-control-label">Password :</label>
                            <input type="password" class="form-control datepicker" id="password3" name="password">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Self Enum :</label>
                            <select class="form-control" data-plugin="select2" id="selfEnum3" name="selfEnum3" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group" id="nipPetugasGroup3">
                            <label for="name" class="form-control-label">Petugas :</label>
                            <select class="form-control" data-plugin="select2" id="nipPetugas3" name="nipPetugas3">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Photo :</label>
                            <img id="photo3Hasil" src="storage/user/" alt=''>
                            <input type="file" class="form-control" id="photo3" name="photo3">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save3" id="save3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="hapusResponden1" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Hapus Responden<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="hapusResponden1Id" action="">
                    <div class="modal-body">
                        <p>Hapus responden <span id=respondenHapus1></span> dari kegiatan kali ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save3" id="save3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="hapusResponden2" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Hapus Responden<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="hapusResponden2Id" action="">
                    <div class="modal-body">
                        <p>Hapus responden <span id=respondenHapus2></span> Selamanya?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save3" id="save3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection