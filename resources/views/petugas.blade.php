@extends('layouts.app2') 
@section('content')
<div class="box">
    <header class="bg-alizarin text-white">
        <h4>Petugas</h4>
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
                    <th style="width: 90px;">NIP</th>
                    <th style="width: 10px;">Tipe</th>
                    <th style="width: 90px;">Jabatan</th>
                    <th style="width: 90px;">Foto</th>
                    <th style="width: 90px;">Aksi</th>
                </tr>
            </thead>
            <tbody id="userContent">
                
            </tbody>
        </table>
        <div class="pull-right">
            <button type="button" class="btn btn-info addUser" data-toggle="modal" data-target="#tambahPetugasLama">
                <i class="fa fa-plus"></i> Tambah Petugas</button>
            <button type="button" class="btn btn-info addUser" data-toggle="modal" data-target="#tambahPetugas">
                <i class="fa fa-plus"></i> Tambah Petugas Baru</button>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Tambah Petugas Baru<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahPetugasId" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama :</label>
                            <input type="text" class="form-control datepicker" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">NIP :</label>
                            <input type="text" class="form-control datepicker" id="nip" name="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Password :</label>
                            <input type="password" class="form-control datepicker" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Tipe Pengguna :</label>
                            <select class="form-control" data-plugin="select2" id="tipe" name="tipe" required>
                                <option value="0">Petugas</option>
                                <option value="1">Pemeriksa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Jabatan :</label>
                            <input type="text" class="form-control datepicker" id="jabatan" name="jabatan" required>
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
    <div class="modal fade" id="tambahPetugasLama" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Tambah Petugas <span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahPetugasId2" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama :</label>
                            <select class="form-control" data-plugin="select2" id="nama2" name="nama2" required>
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
    <div class="modal fade" id="ubahPetugas" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Ubah Petugas<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ubahPetugasId" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama :</label>
                            <input type="text" class="form-control datepicker" id="nama3" name="nama" required>
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
                            <label for="name" class="form-control-label">Tipe Pengguna :</label>
                            <select class="form-control" data-plugin="select2" id="tipe3" name="tipe" required>
                                <option value="0">Petugas</option>
                                <option value="1">Pemeriksa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Jabatan :</label>
                            <input type="text" class="form-control datepicker" id="jabatan3" name="jabatan" required>
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
    <div class="modal fade" id="hapusPetugas1" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Hapus Petugas<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="hapusPetugas1Id" action="">
                    <div class="modal-body">
                        <p>Hapus petugas <span id=petugasHapus1></span> dari kegiatan kali ini?</p>
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
    <div class="modal fade" id="hapusPetugas2" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Hapus Petugas<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="hapusPetugas2Id" action="">
                    <div class="modal-body">
                        <p>Hapus petugas <span id=petugasHapus2></span> Selamanya?</p>
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