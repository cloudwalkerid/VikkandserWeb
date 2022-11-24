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

function update(mulai, akhir, nipPetugas, nipPengawas) {
    $.ajax({
        url: urlbase+'/survei/edit',
        type: 'POST',
        data: {mulai:mulai, akhir:akhir, nippetugas:nipPetugas, nippemeriksa:nipPengawas}, 
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if(data=='1'){
                changeMulaiDanAkhirHtml(mulai, akhir, nipPetugas, nipPengawas);
                $.notify({message: 'sukses memperbarui tanggal' },{type: 'success'});
            }else{
                $.notify({message: 'gagal memperbarui tanggal' },{type: 'danger'});
            }
        },
        error: function (data) {
            $.notify({message: 'gagal memperbarui tanggal' },{type: 'danger'});
        }
    });
}
// function start() {
//     $.ajax({
//         url: urlbase+'/survei/start',
//         type: 'POST',
//         headers: {
//             'X-CSRF-Token': $('meta[name="_token"]').attr('content')
//         },
//         success: function (data) {
//             if(data=='1'){
//                 $.notify({message: 'sukses memulai survei' },{type: 'success'});
//                 $('#alredyDiv').addClass('hidden');
//                 location.reload(); 
//             }else{
//                 $.notify({message: 'gagal memulai survei' },{type: 'danger'});
//             }
//         },
//         error: function (data) {
//             $.notify({message: 'gagal memulai survei' },{type: 'danger'});
//         }
//     });
// }
function changeMulaiDanAkhirHtml(mulai, akhir, nipPetugas, nipPengawas){
    $("#mulaiSpan").text(mulai);
    $("#akhirSpan").text(akhir);
    $("#petugasSpin").text(nipPetugas);
    $("#pemeriksaSpan").text(nipPengawas);
}
$(document).ready(function () {
    $('#ubahSuveiId').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            update($('#mulai').val(), $('#akhir').val(), $('#petugas').val(), $('#pemeriksa').val());
            $("#ubahSurvei").modal('hide');
        }
    });
    $('#mulaiButton').on('click', function () {
        if($('#mulaiSpan').text()==''){
            $.notify({message: 'Gagal memulai, tanggal mulai tidak boleh kosong' },{type: 'danger'});
        }else if($('#akhirSpan').text()==''){
            $.notify({message: 'Gagal memulai, tanggal akhir tidak boleh kosong' },{type: 'danger'});
        }else if($('#petugasSpin').text()==''){
            $.notify({message: 'Gagal memulai, petugas tidak boleh kosong' },{type: 'danger'});
        }else if($('#pemeriksaSpan').text()==''){
            $.notify({message: 'Gagal memulai, pemeriksa tidak boleh kosong' },{type: 'danger'});
        }else{
            $('#mulaiSurvei').modal();
        }
    });
});