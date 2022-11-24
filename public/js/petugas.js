var photo = "";
var listUserGlo;
var indexAction = 0;
var selectedUser;
function addPetugasFirst(nip, password, nama, tipePengguna, jabatan, photo){
    $.ajax({
        url: urlbase+'/petugas/addPetugas',
        type: 'POST',
        data: {nip: nip, password: password, nama: nama
            , tipePengguna:tipePengguna, jabatan: jabatan
            , photo:photo, addAction: '1'}, 
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if(data=='1'){
                $.notify({message: 'sukses menambah petugas' },{type: 'success'});
                var newData = {nip: nip, nama: nama
                    , tipePengguna:tipePengguna, jabatan: jabatan, photo:photo};
                listPetugas.push(newData);
                photo = "";
                loadHTML();
            }else{
                photo = "";
                $.notify({message: 'gagal menambah petugas' },{type: 'danger'});
            }
        },
        error: function (data) {
            photo = "";
            $.notify({message: 'gagal menambah petugas' },{type: 'danger'});
        }
    });
}

function addPetugasSecond(nip){
    $.ajax({
        url: urlbase+'/petugas/addPetugas',
        type: 'POST',
        data: {nip: nip, addAction: '2'}, 
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if(data=='1'){
                $.notify({message: 'sukses menambah petugas' },{type: 'success'});
                for(var i=0; i<listUserGlo.length; i++){
                    if(listUserGlo[i]['nip']==nip){
                        var newData = {nip: nip, nama: listUserGlo[i]['nama']
                            , tipePengguna:listUserGlo[i]['tipePengguna']
                            , jabatan: listUserGlo[i]['jabatan']
                            , photo: listUserGlo[i]['photo']};
                        listPetugas.push(newData);
                        photo = "";
                        loadHTML();
                        break;
                    }
                }
                
            }else{
                photo = "";
                $.notify({message: 'gagal menambah petugas' },{type: 'danger'});
            }
        },
        error: function (data) {
            photo = "";
            $.notify({message: 'gagal menambah petugas' },{type: 'danger'});
        }
    });
}

function getPetugas(){
    $.ajax({
        url: urlbase+'/petugas/getPetugas',
        type: 'POST',
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            var listUser = JSON.parse(data);
            var listUserBaru = [];
            for(var i=0; i<listUser.length; i++){
                var sudahAda = false;
                for(var j=0; j<listPetugas.length; j++){
                    if(listUser[i]['nip']==listPetugas[j]['nip']){
                        sudahAda = true;
                        break;
                    }
                }
                if(!sudahAda){
                    listUserBaru.push(listUser[i]);
                }
            }
            for(var i=0; i<listUserBaru.length; i++){
                $('#nama2')
                    .append($("<option></option>")
                    .attr("value",listUserBaru[i]['nip'])
                    .text(listUserBaru[i]['nama'])); 
            }
            listUserGlo = listUserBaru;
        },
        error: function (data) {
            photo = "";
            $.notify({message: 'gagal menambah petugas' },{type: 'danger'});
        }
    });
}

function loadHTML(){
    $('#userContent').html("");
    if(listPetugas!=null){
        if(listPetugas.length>0){
            var data = "";
            for (var i = 0; i < listPetugas.length; i++) {
                data = data +"<tr>"
                +"<td style=\"width: 30px;\">"+(i+1)+"</td>"
                +"<td style=\"width: 100px;\">"+listPetugas[i]["nama"]+"</td>"
                +"<td style=\"width: 90px;\">"+listPetugas[i]["nip"]+"</td>"
                +"<td style=\"width: 10px;\">"+listPetugas[i]["tipePengguna"]+"</td>"
                +"<td style=\"width: 90px;\">"+listPetugas[i]["jabatan"]+"</td>"
                +"<td style=\"width: 90px;\">"
                    +"<img src=\""+urlbase+"/img/user/"+listPetugas[i]["photo"]+"\" id = 'nip-"+listPetugas[i]["nip"]+"' alt='' >"
                +"</td>"
                +"<td style=\"width: 90px;\">"
                    +"<div class=\"btn-group\">"
                        +"<a class=\"btn btn-primary\" href=\"#!\">"
                        +"<i class=\"fa fa-pencil-square-o fa-fw\"></i> Aksi</a>"
                        +"<a class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" href=\"#!\">"
                            +"<span class=\"fa fa-caret-down\" title=\"Toggle dropdown menu\"></span>"
                        +"</a>"
                        +"<ul class=\"dropdown-menu\">"
                            +"<li><a href=\"#!\" class=\"editUser\" data-nip=\""+listPetugas[i]["nip"]+"\"><i class=\"fa fa-pencil fa-fw\"></i> Ubah</a></li>"
                            +"<li><a href=\"#!\" class=\"deleteUser\" data-nip=\""+listPetugas[i]["nip"]+"\"><i class=\"fa fa-trash-o fa-fw\"></i> Hapus</a></li>"
                            +"<li><a href=\"#!\" class=\"deleteUserForEver\" data-nip=\""+listPetugas[i]["nip"]+"\"><i class=\"fa fa-unlock\"></i> Hapus Selamanya</a></li>"
                        +"</ul>"
                    +"</div>"    
                +"</td></tr>";
            }
            $('#userContent').html(data);
            for (var i = 0; i < listPetugas.length; i++) {
                var photoIdd = "nip-"+listPetugas[i]["nip"];
                setTimeout(resizeImage(photoIdd),1000);
            }
        }
    }
    $('#userContent').after();
}
function ubahPetugas(actionUpdate, nip, password, nama, tipePengguna, jabatan, photo){
    $.ajax({
        url: urlbase+'/petugas/ubahPetugas',
        type: 'POST',
        data: {nip: nip, password: password, nama: nama
            , tipePengguna:tipePengguna, jabatan: jabatan
            , photo:photo, ubahAction: actionUpdate}, 
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if(data=='1'){
                $.notify({message: 'sukses memperbarui petugas' },{type: 'success'});
                var newData = {nip: nip, nama: nama
                    , tipePengguna:tipePengguna, jabatan: jabatan, photo:photo};
                for(var i=0; listPetugas.length; i++){
                    if(listPetugas[i]['nip']==nip){
                        listPetugas[i] = newData;
                        break;
                    }
                }
                photo = "";
                loadHTML();
            }else{
                photo = "";
                $.notify({message: 'gagal memperbarui petugas' },{type: 'danger'});
            }
            selectedUser = null;
        },
        error: function (data) {
            photo = "";
            $.notify({message: 'gagal memperbarui petugas' },{type: 'danger'});
            selectedUser = null;
        }
    });
}
function deletePetugasFirst(nip){
    $.ajax({
        url: urlbase+'/petugas/deletePetugas',
        type: 'POST',
        data: {nip: nip, deleteAction: '1'}, 
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if(data=='1'){
                $.notify({message: 'sukses menghapus petugas' },{type: 'success'});
                var listPetugasBaru = [];
                for(var i=0; i<listPetugas.length; i++){
                    if(listPetugas[i]['nip']!=nip){
                        listPetugasBaru.push(listPetugas[i]);
                    }
                }
                listPetugas = listPetugasBaru;
                loadHTML();
            }else{
                photo = "";
                $.notify({message: 'gagal menghapus petugas' },{type: 'danger'});
            }
            selectedUser = null;
        },
        error: function (data) {
            photo = "";
            $.notify({message: 'gagal menghapus petugas' },{type: 'danger'});
            selectedUser = null;
        }
    });
}
function deletePetugasSecond(nip){
    $.ajax({
        url: urlbase+'/petugas/deletePetugas',
        type: 'POST',
        data: {nip: nip, deleteAction: '2'}, 
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if(data=='1'){
                $.notify({message: 'sukses menghapus petugas' },{type: 'success'});
                var listPetugasBaru = [];
                for(var i=0; i<listPetugas.length; i++){
                    if(listPetugas[i]['nip']!=nip){
                        listPetugasBaru.push(listPetugas[i]);
                    }
                }
                listPetugas = listPetugasBaru;
                loadHTML();
            }else{
                photo = "";
                $.notify({message: 'gagal menghapus petugas' },{type: 'danger'});
            }
            selectedUser = null;
        },
        error: function (data) {
            photo = "";
            $.notify({message: 'gagal menghapus petugas' },{type: 'danger'});
            selectedUser = null;
        }
    });
}
function uploadPhoto(id){
    $(id).attr("src","");
    var file_data = $("#photo1").prop("files")[0];
    var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("photo", file_data)   
    $.ajax({
        url: urlbase+'/petugas/uploadPhoto',
        type: 'POST',
        data: form_data, 
        processData: false, 
        contentType: false,
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            $("#photo1Hasil").attr("src",urlbase+"/img/user/"+data);
            photo = data;
            setTimeout(function(){
                resizeImage("photo1Hasil");
            },1000);
        },
        error: function (data) {
        }
    });
}
function uploadPhotoEdit(id){
    $(id).attr("src","");
    var file_data = $("#photo3").prop("files")[0];
    var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("photo", file_data)   
    $.ajax({
        url: urlbase+'/petugas/uploadPhoto',
        type: 'POST',
        data: form_data, 
        processData: false, 
        contentType: false,
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            $("#photo3Hasil").attr("src",urlbase+"/img/user/"+data);
            photo = data;
            setTimeout(function(){
                resizeImage("photo3Hasil");
            },1000);
        },
        error: function (data) {
        }
    });
}
function resizeImage($id){
    var maxWidth = 100; // Max width for the image
    var maxHeight = 100;    // Max height for the image
    var ratio = 0;  // Used for aspect ratio
    var width = $('#'+$id).width();    // Current image width
    var height = $('#'+$id).height();  // Current image height
    // alert($('#'+$id).width());
    // alert($('#'+$id).height());

    // Check if the current width is larger than the max
    if(width > maxWidth){
        ratio = maxWidth / width;   // get ratio for scaling image
        $('#'+$id).css("width", maxWidth); // Set new width
        $('#'+$id).css("height", (height * ratio));  // Scale height based on ratio
        height = height * ratio;    // Reset height to match scaled image
        width = width * ratio;    // Reset width to match scaled image
    }

    // Check if current height is larger than max
    if(height > maxHeight){
        ratio = maxHeight / height; // get ratio for scaling image
        $('#'+$id).css("height", maxHeight);   // Set new height
        $('#'+$id).css("width", (width * ratio));    // Scale width based on ratio
        width = width * ratio;    // Reset width to match scaled image
        height = height * ratio;    // Reset height to match scaled image
    }
    //$("#photo1Hasil").attr("src",$url);
}

$(document).ready(function () {
    $('#photo1').on('change', function () {
        photo = "";
        uploadPhoto("#photo1");
    });
    $('#photo3').on('change', function () {
        photo = "";
        uploadPhotoEdit("#photo3");
    });
    $("#tambahPetugas").on('shown.bs.modal', function (e) {
        $("#photo1Hasil").attr("src","");
        $('#nip').val(""); 
        $('#password').val("");
        $('#nama').val("");
        $('#tipe').val("1"); 
        $('#jabatan').val("")
        $('#photo1').val("")
        photo = "";
    });
    $("#tambahPetugas").on('hidden.bs.modal', function (e) {
        $("#photo1Hasil").attr("src","");
        $('#nip').val(""); 
        $('#password').val("");
        $('#nama').val("");
        $('#tipe').val("1"); 
        $('#jabatan').val("")
        $('#photo1').val("")
        photo = "";
    });
    $("#tambahPetugasLama").on('shown.bs.modal', function (e) {
        $('#nama2').children().remove();
        getPetugas();
    });
    $("#tambahPetugasLama").on('hidden.bs.modal', function (e) {
        $('#nama2').children().remove();
    });
    $('#tambahPetugasId').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            addPetugasFirst($('#nip').val(), $('#password').val(), $('#nama').val(), 
                $('#tipe').val(), $('#jabatan').val(), photo);
            $('#tambahPetugas').modal('hide');
        }
    });
    $('#tambahPetugasId2').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            addPetugasSecond($('#nama2').val());
            $('#tambahPetugasLama').modal('hide');
        }
    });
    $('#userContent').on('click','.editUser', function(){
        var selectedEdit;
        for(var i=0; i<listPetugas.length; i++){
            if(listPetugas[i]['nip']== $(this).data('nip')){
                selectedEdit = listPetugas[i];
                break;
            }
        }
        photo = selectedEdit['photo'];
        selectedUser = selectedEdit;
        $("#photo3Hasil").attr("src",urlbase+"/img/user/"+selectedEdit['photo']);
        $('#nip3').val(selectedEdit['nip']); 
        // $('#password').val(selectedEdit['']);
        $('#nama3').val(selectedEdit['nama']);
        $('#tipe3').val(selectedEdit['tipePengguna']); 
        $('#jabatan3').val(selectedEdit['jabatan']);
        $('#ubahPass').addClass('hidden');
        indexAction = 2;
        setTimeout(function(){
            resizeImage("photo3Hasil");
        },1000);
        //$('#photo1').val(selectedEdit[''])
        $('#ubahPetugas').modal();
    });
    $('#ubahPetugasId').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            ubahPetugas(indexAction, selectedUser['nip'], $('#password3').val(), $('#nama3').val(), 
            $('#tipe3').val(), $('#jabatan3').val(), photo);
            $('#password3').val(""); 
            $('#nama3').val(""); 
            $('#tipe3').val("1"); 
            $('#jabatan3').val(""); 
            photo = "";
            $('#photo3').val("");
            $('#ubahPetugas').modal('hide');
        }
    });
    $('#userContent').on('click','.deleteUser', function(){
        var selectedEdit;
        for(var i=0; i<listPetugas.length; i++){
            if(listPetugas[i]['nip']== $(this).data('nip')){
                selectedEdit = listPetugas[i];
                break;
            }
        }
        selectedUser = selectedEdit;
        $('#petugasHapus1').text(selectedUser['nama']);
        $('#hapusPetugas1').modal();
    });
    $('#hapusPetugas1Id').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            deletePetugasFirst(selectedUser['nip']);
            $('#hapusPetugas1').modal('hide');
        }
    });
    $('#userContent').on('click','.deleteUserForEver', function(){
        var selectedEdit;
        for(var i=0; i<listPetugas.length; i++){
            if(listPetugas[i]['nip']== $(this).data('nip')){
                selectedEdit = listPetugas[i];
                break;
            }
        }
        selectedUser = selectedEdit;
        $('#petugasHapus2').text(selectedUser['nama']);
        $('#hapusPetugas2').modal();
    });
    $('#hapusPetugas2Id').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            deletePetugasSecond(selectedUser['nip']);
            $('#hapusPetugas2').modal('hide');
        }
    });
    $("#ubahPetugas" ).on( 'change', "#defaultCheck1", function(){
        if(!$(this).prop( "checked")){
            $('#ubahPass').addClass('hidden');
            indexAction = 2;
        }else{
            indexAction = 1;
            $('#ubahPass').removeClass('hidden');
        }
    });
});
