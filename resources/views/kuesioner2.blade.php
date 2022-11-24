@extends('layouts.app2') @section('content')
<div class="box">
    <header class="bg-alizarin text-white">
        <h4>Kuesioner Upah Jasa Konstruksi</h4>
        <!-- begin box-tools -->
        <div class="box-tools">
            <a class="fa fa-fw fa-minus" href="#" data-box="collapse"></a>
            <a class="fa fa-fw fa-square-o" href="#" data-fullscreen="box"></a>
        </div>
        <!-- END: box-tools -->
    </header>
    <div class="box-body collapse in">
        <br>
        <table class="table-bordered" style="padding:5px;" id="blueprint">
            <col>
            <col>
            <col>
            <col>
            <col>
            <col>
            <col>
            <tr>
                <th>Barang</th>
                <th>Kualitas</th>
                <th>Satuan Unit</th>
                <th>Nilai Sewa</th>
                <th>Keterangan</th>
                <th>Aksi Kualitas</th>
                <th>Aksi Barang</th>
            </tr>
        </table>
        <br>
        <br>
        <div class="pull-right">
            <button type="button" class="btn btn-info addBarang">
                <i class="fa fa-plus"></i> Tambah Barang</button>
        </div>
    </div>
</div>
<div>
    <div class="modal fade" id="tambahBarangModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Tambah Barang<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahBarang" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama Barang :</label>
                            <input type="text" class="form-control datepicker" id="barang1" name="barang1" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama Kualitas :</label>
                            <input type="text" class="form-control datepicker" id="kualitas1" name="kualitas1" required>
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
    <div class="modal fade" id="tambahKualitasModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Tambah Kualitas <span id="namabarang2"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahKualitas" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama Kualitas :</label>
                            <input type="text" class="form-control datepicker" id="kualitas2" name="kualitas2" required>
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
    <div class="modal fade" id="hapusBarangModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Hapus Barang <span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="hapusBarang" action="">
                    <div class="modal-body">
                        <p>Hapus Barang <span id="namaBarang3"></span> ?</p>
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
    <div class="modal fade" id="hapusKualitasModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Hapus Petugas<span id="namaClosedModal"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="hapusKualitas" action="">
                    <div class="modal-body">
                        <p>Hapus Barang <span id="namaBarang4"></span> dengan kualitas <span id="namaKualitas4"></span> ?</p>
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
    <div class="modal fade" id="ubahIsiModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Ubah Isian <span id="namaKualitas5"></span>:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ubahIsi" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Tipe Isian :</label>
                            <select class="form-control" data-plugin="select2" id="tipe5" name="tipe5" required>
                                <option value="2">Boleh Diisi</option>
                                <option value="1">Tidak Boleh Diisi</option>
                            </select>
                        </div>
                        <div class="form-group" id="isiGroup">
                            <label for="name" class="form-control-label">Isi :</label>
                            <input type="text" class="form-control datepicker" id="isi5" name="isi5">
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
@endsection
