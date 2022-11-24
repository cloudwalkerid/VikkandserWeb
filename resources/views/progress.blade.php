@extends('layouts.app2') @section('content')
<div class="box">
    <header class="bg-alizarin text-white">
        <h4>Progress</h4>
        <!-- begin box-tools -->
        <div class="box-tools">
            <a class="fa fa-fw fa-minus" href="#" data-box="collapse"></a>
            <a class="fa fa-fw fa-square-o" href="#" data-fullscreen="box"></a>
        </div>
        <!-- END: box-tools -->
    </header>
    <div class="box-body collapse in">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 100px;">Nama</th>
                    <th style="width: 90px;">Tipe</th>
                    <th style="width: 90px;">Petugas</th>
                    <th style="width: 10px;">Sudah Diubah</th>
                    <th style="width: 90px;">Telah Dikirim</th>
                    <th style="width: 90px;">Target Isian</th>
                </tr>
            </thead>
            <tbody id="userContent">
            </tbody>
        </table>
    </div>
</div>
@endsection
