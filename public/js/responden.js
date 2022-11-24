var photo = "";
var listRespondenGlo;
var indexAction = 0;
var selectedResponden;
var listUserGlo;

function addRespondenFirst(username, password, nama, tipeResponden, isSelfEnum, 
    nipPetugas, photo, next) {
    $.ajax({
        url: urlbase+'/responden/addResponden',
        type: 'POST',
        data: {
            username: username,
            password: password,
            nama: nama,
            tipeResponden: tipeResponden,
            isSelfEnum: isSelfEnum,
            photo: photo,
            nipPetugas: nipPetugas,
            addAction: '1'
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '1') {
                $.notify({
                    message: 'sukses menambah responden'
                }, {
                    type: 'success'
                });
                var newData = {
                    username: username,
                    nama: nama,
                    tipeResponden: tipeResponden,
                    isSelfEnum: isSelfEnum,
                    nipPetugas: nipPetugas,
                    photo: photo
                };
                listResponden.push(newData);
                photo = "";
                loadHTML();
            } else {
                photo = "";
                $.notify({
                    message: 'gagal menambah responden'
                }, {
                    type: 'danger'
                });
            }
            next();
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal menambah responden'
            }, {
                type: 'danger'
            });
            next();
        }
    });
}

function addRespondenSecond(username, tipeResponden, isSelfEnum, nipPetugas, next) {
    $.ajax({
        url: urlbase+'/responden/addResponden',
        type: 'POST',
        data: {
            username: username,
            tipeResponden: tipeResponden,
            isSelfEnum: isSelfEnum,
            nipPetugas: nipPetugas,
            addAction: '2'
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '1') {
                $.notify({
                    message: 'sukses menambah responden'
                }, {
                    type: 'success'
                });
                for (var i = 0; i < listRespondenGlo.length; i++) {
                    if (listRespondenGlo[i]['username'] == username) {
                        var newData = {
                            username: username,
                            nama: listRespondenGlo[i]['nama'],
                            tipeResponden: tipeResponden,
                            isSelfEnum: isSelfEnum,
                            nipPetugas: nipPetugas,
                            photo: listRespondenGlo[i]['photo']
                        };
                        listResponden.push(newData);
                        photo = "";
                        loadHTML();
                        break;
                    }
                }
            } else {
                photo = "";
                $.notify({
                    message: 'gagal menambah responden'
                }, {
                    type: 'danger'
                });
            }
            next();
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal menambah responden'
            }, {
                type: 'danger'
            });
            next();
        }
    });
}

function getPetugas(next) {
    $.ajax({
        url: urlbase+'/responden/getPetugas',
        type: 'POST',
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            var listUser = JSON.parse(data);
            for (var i = 0; i < listUser.length; i++) {
                $('#nipPetugas')
                    .append($("<option></option>")
                        .attr("value", listUser[i]['nip'])
                        .text(listUser[i]['nama']));
                $('#nipPetugas2')
                    .append($("<option></option>")
                        .attr("value", listUser[i]['nip'])
                        .text(listUser[i]['nama']));
                $('#nipPetugas3')
                    .append($("<option></option>")
                        .attr("value", listUser[i]['nip'])
                        .text(listUser[i]['nama']));
            }
            listUserGlo = listUser;
            next();
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal menambah petugas'
            }, {
                type: 'danger'
            });
        }
    });
}


function getResponden() {
    $.ajax({
        url: urlbase+'/responden/getResponden',
        type: 'POST',
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            var list = JSON.parse(data);

            for (var i = 0; i < list.length; i++) {
                $('#namaResponden2')
                    .append($("<option></option>")
                        .attr("value", list[i]['username'])
                        .text(list[i]['nama']));
            }
            listRespondenGlo = list;
        },
        error: function (data) {
        }
    });
}

function loadHTML() {
    $('#userContent').html("");
    if (listResponden != null) {
        if (listResponden.length > 0) {
            var data = "";
            for (var i = 0; i < listResponden.length; i++) {
                data = data + "<tr>" +
                    "<td style=\"width: 30px;\">" + (i + 1) + "</td>" +
                    "<td style=\"width: 100px;\">" + listResponden[i]["nama"] + "</td>" +
                    "<td style=\"width: 90px;\">" + listResponden[i]["username"] + "</td>";
                if (listResponden[i]["tipeResponden"] == '1') {
                    data = data + "<td style=\"width: 10px;\">Toko Bangunan</td>";
                } else if (listResponden[i]["tipeResponden"] == '2') {
                    data = data + "<td style=\"width: 10px;\">Toko Bahan Material</td>";
                } else if (listResponden[i]["tipeResponden"] == '3') {
                    data = data + "<td style=\"width: 10px;\">Kayu Kuseng</td>";
                } else if (listResponden[i]["tipeResponden"] == '4') {
                    data = data + "<td style=\"width: 10px;\">Kaca</td>";
                } else if (listResponden[i]["tipeResponden"] == '5') {
                    data = data + "<td style=\"width: 10px;\">Alat Berat</td>";
                } else if (listResponden[i]["tipeResponden"] == '6') {
                    data = data + "<td style=\"width: 10px;\">Alumunium</td>";
                } else if (listResponden[i]["tipeResponden"] == '7') {
                    data = data + "<td style=\"width: 10px;\">Upah Konstruksi</td>";
                }else {
                    data = data + "<td style=\"width: 10px;\"></td>";
                }

                data = data + "<td style=\"width: 90px;\">" + listResponden[i]["isSelfEnum"] + "</td>" +
                    "<td style=\"width: 90px;\">" +
                    "<img src=\""+urlbase+"/img/responden/" + listResponden[i]["photo"] + "\" id = 'nip-" + listResponden[i]["username"] +"-"+(i + 1)+ "' alt='' >" +
                    "</td>" ;
                if(listResponden[i]["nipPetugas"]!=null){
                    data = data + "<td style=\"width: 90px;\">"+listResponden[i]["nipPetugas"]+"</td>";
                }else{
                    data = data + "<td style=\"width: 90px;\"></td>";
                }
                data = data +"<td style=\"width: 90px;\">" +
                    "<div class=\"btn-group\">" +
                    "<a class=\"btn btn-primary\" href=\"#!\">" +
                    "<i class=\"fa fa-pencil-square-o fa-fw\"></i> Aksi</a>" +
                    "<a class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" href=\"#!\">" +
                    "<span class=\"fa fa-caret-down\" title=\"Toggle dropdown menu\"></span>" +
                    "</a>" +
                    "<ul class=\"dropdown-menu\">" +
                    "<li><a href=\"#!\" class=\"editUser\" data-id=\"" + listResponden[i]["id"] + "\"><i class=\"fa fa-pencil fa-fw\"></i> Ubah</a></li>" +
                    "<li><a href=\"#!\" class=\"deleteUser\" data-id=\"" + listResponden[i]["id"] + "\"><i class=\"fa fa-trash-o fa-fw\"></i> Hapus</a></li>" +
                    "<li><a href=\"#!\" class=\"deleteUserForEver\" data-id=\"" + listResponden[i]["id"] + "\"><i class=\"fa fa-unlock\"></i> Hapus Selamanya</a></li>" +
                    "</ul>" +
                    "</div>" +
                    "</td></tr>";
            }
            $('#userContent').html(data);
            for (var i = 0; i < listResponden.length; i++) {
                var photoIdd = "nip-"+listResponden[i]["username"] +"-"+(i + 1);
                setTimeout(resizeImage(photoIdd), 1000);
            }
        }
    }
    $('#userContent').after();
}

function ubahResponden(id, actionUpdate, username, password, nama, tipeResponden, isSelfEnum, nipPetugas, photo, next) {
    $.ajax({
        url: urlbase+'/responden/ubahResponden',
        type: 'POST',
        data: {
            username: username,
            password: password,
            nama: nama,
            tipeResponden: tipeResponden,
            isSelfEnum: isSelfEnum,
            nipPetugas: nipPetugas,
            photo: photo,
            ubahAction: actionUpdate
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '1') {
                $.notify({
                    message: 'sukses memperbarui responden'
                }, {
                    type: 'success'
                });
                var newData = {
                    id: id,
                    username: username,
                    nama: nama,
                    tipeResponden: tipeResponden,
                    isSelfEnum : isSelfEnum,
                    nipPetugas: nipPetugas,
                    photo: photo
                };
                // alert(JSON.stringify(listResponden));
                for (var i = 0; i<listResponden.length; i++) {
                    if (listResponden[i]['username'] == username && listResponden[i]['tipeResponden'] == tipeResponden) {
                        listResponden[i] = newData;
                    }
                    if (listResponden[i]['username'] == username) {
                        listResponden[i]['nama'] = nama;
                        listResponden[i]['photo'] = photo;
                    }
                }
                photo = "";
                loadHTML();
            } else {
                photo = "";
                $.notify({
                    message: 'gagal memperbarui responden'
                }, {
                    type: 'danger'
                });
            }
            selectedResponden = null;
            next();
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal memperbarui responden'
            }, {
                type: 'danger'
            });
            selectedResponden = null;
            next();
        }
    });
}

function deleteRespondenFirst(username, tipeResponden) {
    $.ajax({
        url: urlbase+'/responden/deleteResponden',
        type: 'POST',
        data: {
            username: username,
            tipeResponden: tipeResponden,
            deleteAction: '1'
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '1') {
                $.notify({
                    message: 'sukses menghapus responden'
                }, {
                    type: 'success'
                });
                var listRespondenBaru = [];
                for (var i = 0; i < listResponden.length; i++) {
                    if (listResponden[i]['username'] != username || listResponden[i]['tipeResponden'] != tipeResponden )  {
                        listRespondenBaru.push(listResponden[i]);
                    }
                }
                listResponden = listRespondenBaru;
                loadHTML();
            } else {
                photo = "";
                $.notify({
                    message: 'gagal menghapus responden'
                }, {
                    type: 'danger'
                });
            }
            selectedUser = null;
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal menghapus responden'
            }, {
                type: 'danger'
            });
            selectedUser = null;
        }
    });
}

function deleteRespondenSecond(username) {
    $.ajax({
        url: urlbase+'/responden/deleteResponden',
        type: 'POST',
        data: {
            username: username,
            deleteAction: '2'
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '1') {
                $.notify({
                    message: 'sukses menghapus responden'
                }, {
                    type: 'success'
                });
                var listRespondenBaru = [];
                for (var i = 0; i < listResponden.length; i++) {
                    if (listResponden[i]['username'] != username) {
                        listRespondenBaru.push(listResponden[i]);
                    }
                }
                listResponden = listRespondenBaru;
                loadHTML();
            } else {
                photo = "";
                $.notify({
                    message: 'gagal menghapus responden'
                }, {
                    type: 'danger'
                });
            }
            selectedUser = null;
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal menghapus responden'
            }, {
                type: 'danger'
            });
            selectedUser = null;
        }
    });
}

function uploadPhoto(id) {
    $(id).attr("src", "");
    var file_data = $("#photo1").prop("files")[0];
    var form_data = new FormData(); // Creating object of FormData class
    form_data.append("photo", file_data)
    $.ajax({
        url: urlbase+'/responden/uploadPhoto',
        type: 'POST',
        data: form_data,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            $("#photo1Hasil").attr("src", urlbase+"/img/responden/" + data);
            photo = data;
            setTimeout(function () {
                resizeImage("photo1Hasil");
            }, 1000);
        },
        error: function (data) {}
    });
}

function uploadPhotoEdit(id) {
    $(id).attr("src", "");
    var file_data = $("#photo3").prop("files")[0];
    var form_data = new FormData(); // Creating object of FormData class
    form_data.append("photo", file_data)
    $.ajax({
        url: urlbase+'/responden/uploadPhoto',
        type: 'POST',
        data: form_data,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            $("#photo3Hasil").attr("src", urlbase+"/img/responden/" + data);
            photo = data;
            setTimeout(function () {
                resizeImage("photo3Hasil");
            }, 1000);
        },
        error: function (data) {}
    });
}

function resizeImage($id) {
    var maxWidth = 100; // Max width for the image
    var maxHeight = 100; // Max height for the image
    var ratio = 0; // Used for aspect ratio
    var width = $('#' + $id).width(); // Current image width
    var height = $('#' + $id).height(); // Current image height
    // alert($('#'+$id).width());
    // alert($('#'+$id).height());

    // Check if the current width is larger than the max
    if (width > maxWidth) {
        ratio = maxWidth / width; // get ratio for scaling image
        $('#' + $id).css("width", maxWidth); // Set new width
        $('#' + $id).css("height", (height * ratio)); // Scale height based on ratio
        height = height * ratio; // Reset height to match scaled image
        width = width * ratio; // Reset width to match scaled image
    }

    // Check if current height is larger than max
    if (height > maxHeight) {
        ratio = maxHeight / height; // get ratio for scaling image
        $('#' + $id).css("height", maxHeight); // Set new height
        $('#' + $id).css("width", (width * ratio)); // Scale width based on ratio
        width = width * ratio; // Reset width to match scaled image
        height = height * ratio; // Reset height to match scaled image
    }
    //$("#photo1Hasil").attr("src",$url);
}

$(document).ready(function () {
    $('#addRespondeenBaru').on('click', function () {
        $('#nipPetugas').children().remove();
        getPetugas(function () {});
        $('#selfEnum').val("0");
        $('#nipPetugasGroup').removeClass('hidden');
        $('#tambahResponden').modal();
    });
    $("#tambahResponden").on('shown.bs.modal', function (e) {
        $("#photo1Hasil").attr("src", "");
        $('#username').val("");
        $('#password').val("");
        $('#nama').val("");
        $('#tipe').val("1");
        $('#selfEnum').val("0");
        $('#nipPetugas').val("");
        $('#photo1').val("")
        photo = "";
    });
    $("#tambahResponden").on('hidden.bs.modal', function (e) {
        $("#photo1Hasil").attr("src", "");
        $('#username').val("");
        $('#password').val("");
        $('#nama').val("");
        $('#tipe').val("1");
        $('#selfEnum').val("0");
        $('#nipPetugas').val("");
        $('#photo1').val("")
        photo = "";
    });
    $('#tambahRespondenId').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            if ($('#selfEnum').val() == '1') {
                addRespondenFirst($('#username').val(), $('#password').val(), $('#nama').val()
                , $('#tipe').val(), $('#selfEnum').val(), "", photo, function(){
                    $('#tambahResponden').modal('hide');
                });
            } else {
                addRespondenFirst($('#username').val(), $('#password').val(), $('#nama').val()
                , $('#tipe').val(), $('#selfEnum').val(), $('#nipPetugas').val(), photo, function(){
                    $('#tambahResponden').modal('hide');
                });
            }
            
        }
    });

    $('#addRespondeen').on('click', function () {
        $('#nipPetugas2').children().remove();
        $('#namaResponden2').children().remove();
        getPetugas(function () {});
        getResponden();
        $('#selfEnum2').val("0");
        $('#nipPetugasGroup2').removeClass('hidden');
        $('#tambahRespondenLama').modal();
    });
    $("#tambahRespondenLama").on('shown.bs.modal', function (e) {
        $("#namaResponden2").val("");
        $('#namaResponden2').val("0");
        $('#nipPetugas2').val("");
        $('#tipe2').val("1");
    });
    $("#tambahRespondenLama").on('hidden.bs.modal', function (e) {
        $("#username2").val("");
        $('#selfEnum2').val("0");
        $('#nipPetugas2').val("");
        $('#tipe2').val("1");
    });
    $('#tambahRespondenId2').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            if($('#selfEnum2').val()=="0"){
                addRespondenSecond($('#namaResponden2').val(), $('#tipe2').val(),
                    $('#selfEnum2').val(), $('#nipPetugas2').val(), function(){
                        $('#tambahRespondenLama').modal('hide');
                    });
            }else if($('#selfEnum2').val()=="1"){
                addRespondenSecond($('#namaResponden2').val(), $('#tipe2').val(),
                    $('#selfEnum2').val(), "", function(){
                        $('#tambahRespondenLama').modal('hide');
                    });
            }
        }
    });
    $('#photo1').on('change', function () {
        photo = "";
        uploadPhoto("#photo1");
    });
    $('#photo3').on('change', function () {
        photo = "";
        uploadPhotoEdit("#photo3");
    });
    $('#userContent').on('click', '.editUser', function () {
        //alert("masuk");
        var selectedEdit;
        for (var i = 0; i < listResponden.length; i++) {
            if (listResponden[i]['id'] == $(this).data('id')) {
                selectedEdit = listResponden[i];
                break;
            }
        }
        photo = selectedEdit['photo'];
        selectedResponden = selectedEdit;
        $("#photo3Hasil").attr("src", urlbase+"/img/responden/" + selectedEdit['photo']);

        $('#nama3').val(selectedEdit['nama']);
        $('#password3').val("");
        $('#selfEnum3').val(selectedEdit["isSelfEnum"]);
        if(selectedEdit["isSelfEnum"]=='0'){
            $('#nipPetugasGroup3').removeClass('hidden');
        }else if(selectedEdit["isSelfEnum"]=='1'){
            $('#nipPetugasGroup3').addClass('hidden');
        }
        $('#nipPetugas3').children().remove();
        getPetugas(function () {
            if (selectedEdit["nipPetugas"] != "") {
                if(selectedEdit["nipPetugas"]!=null){
                    //alert(selectedEdit["nipPetugas"]);
                    $('#nipPetugas3').val(selectedEdit["nipPetugas"]);
                }
            }
        });
        $('#photo3').val("")

        $('#ubahPass').addClass('hidden');
        indexAction = 2;
        setTimeout(function () {
            resizeImage("photo3Hasil");
        }, 1000);
        //alert("mmmm");
        //$('#photo1').val(selectedEdit[''])
        $('#ubahResponden').modal();
    });
    $('#ubahRespondenId').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            if ($('#selfEnum3').val() == '0') {
                ubahResponden(selectedResponden['id'], indexAction, selectedResponden['username'], $('#password3').val(), $('#nama3').val()
                , selectedResponden['tipeResponden'], $('#selfEnum3').val()
                , $('#nipPetugas3').val(), photo, function(){
                    $('#ubahResponden').modal('hide');
                });
            } else {
                ubahResponden(selectedResponden['id'], indexAction, selectedResponden['username'], $('#password3').val(), $('#nama3').val()
                , selectedResponden['tipeResponden'], $('#selfEnum3').val()
                , "", photo, function(){
                    $('#ubahResponden').modal('hide');
                });
            }

            $("#photo3Hasil").attr("src", "");

            $('#nama3').val("");
            $('#password3').val("");
            $('#selfEnum3').val("0");
            $('#nipPetugasGroup3').removeClass('hidden');
            $('#nipPetugas3').children().remove();
            $('#nipPetuga3s').val("");
            $('#photo3').val("")

            $('#ubahPass').addClass('hidden');
        }
    });
    $('#userContent').on('click', '.deleteUser', function () {
        var selectedEdit;
        for (var i = 0; i < listResponden.length; i++) {
            if (listResponden[i]['id'] == $(this).data('id')) {
                selectedEdit = listResponden[i];
                break;
            }
        }
        selectedResponden = selectedEdit;
        $('#respondenHapus1').text(selectedResponden['nama']);
        $('#hapusResponden1').modal();
    });
    $('#hapusResponden1Id').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            deleteRespondenFirst(selectedResponden['username'], selectedResponden["tipeResponden"])
            $('#hapusResponden1').modal('hide');
        }
    });
    $('#userContent').on('click', '.deleteUserForEver', function () {
        var selectedEdit;
        for (var i = 0; i < listResponden.length; i++) {
            if (listResponden[i]['id'] == $(this).data('id')) {
                selectedEdit = listResponden[i];
                break;
            }
        }
        selectedResponden = selectedEdit;
        $('#respondenHapus2').text(selectedResponden['nama']);
        $('#hapusResponden2').modal();
    });
    $('#hapusResponden2Id').submit(function (event) {
        //alert( "Handler for .submit() called." );
        //alert(event.isDefaultPrevented());
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            deleteRespondenSecond(selectedResponden['username'])
            $('#hapusResponden2').modal('hide');
        }
    });
    $("#ubahResponden").on('change', "#defaultCheck1", function () {
        if (!$(this).prop("checked")) {
            $('#ubahPass').addClass('hidden');
            indexAction = 2;
        } else {
            indexAction = 1;
            $('#ubahPass').removeClass('hidden');
        }
    });
    $("#tambahResponden").on('change', "#selfEnum", function () {
        //alert($('#selfEnum').val());
        if ($('#selfEnum').val() == '1') {
            $('#nipPetugasGroup').addClass('hidden');
        } else if ($('#selfEnum').val() == '0') {
            $('#nipPetugasGroup').removeClass('hidden');
        }
    });
    $("#tambahRespondenLama").on('change', "#selfEnum2", function () {
        //alert($('#selfEnum').val());
        if ($('#selfEnum2').val() == '1') {
            $('#nipPetugasGroup2').addClass('hidden');
        } else if ($('#selfEnum2').val() == '0') {
            $('#nipPetugasGroup2').removeClass('hidden');
        }
    });
    $("#ubahResponden").on('change', "#selfEnum3", function () {
        //alert($('#selfEnum').val());
        if ($('#selfEnum3').val() == '1') {
            $('#nipPetugasGroup3').addClass('hidden');
        } else if ($('#selfEnum3').val() == '0') {
            $('#nipPetugasGroup3').removeClass('hidden');
        }
    });
});
