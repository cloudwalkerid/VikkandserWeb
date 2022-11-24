var listBlueprint = [];

function arrange() {
    listBlueprint = [];
    for (var i = 0; i < listItemBlueprint.length; i++) {
        var sudahAda = false;
        for (var j = 0; j < listBlueprint.length; j++) {
            if (listItemBlueprint[i]['uid_barang'] == listBlueprint[j]['uid_barang']) {
                listBlueprint[j]['kualitass'].push(listItemBlueprint[i]);
                sudahAda = true;
                break
            }
        }
        if (!sudahAda) {
            var newData = {
                uid_barang: listItemBlueprint[i]['uid_barang'],
                barang: listItemBlueprint[i]['barang'],
                kualitass: []
            };
            newData['kualitass'].push(listItemBlueprint[i]);
            listBlueprint.push(newData);
        }
    }
    console.log(JSON.stringify(listBlueprint));
}

function loadHTML() {
    $("#blueprint").html("<col>"
        +"<col>"
        +"<col>"
        +"<col>"
        +"<col>"
        +"<col>"
        +"<col>"
        +"<tr>"
            +"<th>Barang</th>"
            +"<th>Kualitas</th>"
            +"<th>Satuan Unit</th>"
            +"<th>Nilai Sewa</th>"
            +"<th>Keterangan</th>"
            +"<th>Aksi Kualitas</th>"
            +"<th>Aksi Barang</th>"
            +"</tr>");
    var dataTable = "";
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j<listBlueprint[i]['kualitass'].length; j++) {
            //alert("masuk");
            if (j == 0) {
                dataTable = dataTable + "<tr><th rowspan='" + listBlueprint[i]['kualitass'].length + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['barang'] + "</th>";
            }else{
                dataTable = dataTable + "<tr>"
            }
            dataTable = dataTable + "<td>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</th>";
            if (listBlueprint[i]['kualitass'][j]['satuan_unit'] == '000-000') {
                dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                    "data-barang='" + listBlueprint[i]['kualitass'][j]['uid_barang'] + "' " +
                    "data-kualitas='" + listBlueprint[i]['kualitass'][j]['uid_kualitas'] + "'" +
                    "data-index='1'></td>";
            } else {
                dataTable = dataTable + "<td class='columnEditable' " +
                    "data-barang='" + listBlueprint[i]['kualitass'][j]['uid_barang'] + "' " +
                    "data-kualitas='" + listBlueprint[i]['kualitass'][j]['uid_kualitas'] + "' " +
                    "data-index='1'>" + listBlueprint[i]['kualitass'][j]['satuan_unit'] + "</td>";
            }
            if (listBlueprint[i]['kualitass'][j]['nilai_sewa'] == '000-000') {
                dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                    "data-barang='" + listBlueprint[i]['kualitass'][j]['uid_barang'] + "' " +
                    "data-kualitas='" + listBlueprint[i]['kualitass'][j]['uid_kualitas'] + "' " +
                    "data-index='2'></td>";
            } else {
                dataTable = dataTable + "<td class='columnEditable' " +
                    "data-barang='" + listBlueprint[i]['kualitass'][j]['uid_barang'] + "' " +
                    "data-kualitas='" + listBlueprint[i]['kualitass'][j]['uid_kualitas'] + "' " +
                    "data-index='2'>" + listBlueprint[i]['kualitass'][j]['nilai_sewa'] + "</td>";
            }
            if (listBlueprint[i]['kualitass'][j]['keterangan'] == '000-000') {
                dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                    "data-barang='" + listBlueprint[i]['kualitass'][j]['uid_barang'] + "' " +
                    "data-kualitas='" + listBlueprint[i]['kualitass'][j]['uid_kualitas'] + "' " +
                    "data-index='3'></td>";
            } else {
                dataTable = dataTable + "<td class='columnEditable' " +
                    "data-barang='" + listBlueprint[i]['kualitass'][j]['uid_barang'] + "' " +
                    "data-kualitas='" + listBlueprint[i]['kualitass'][j]['uid_kualitas'] + "' " +
                    "data-index='3'>" + listBlueprint[i]['kualitass'][j]['keterangan'] + "</td>";
            }
            
            dataTable = dataTable + "<td> " +
                "<div class=\"btn-group\">" +
                "<a class=\"btn btn-primary\" href=\"#!\">" +
                "<i class=\"fa fa-pencil-square-o fa-fw\"></i> Aksi</a>" +
                "<a class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" href=\"#!\">" +
                "<span class=\"fa fa-caret-down\" title=\"Toggle dropdown menu\"></span>" +
                "</a>" +
                "<ul class=\"dropdown-menu\">" +
                "<li><a href=\"#!\" class=\"deleteKualitas\"  data-barang=\"" + listBlueprint[i]['kualitass'][j]["uid_barang"] + "\""+
                "data-kualitas=\"" + listBlueprint[i]['kualitass'][j]["uid_kualitas"] + "\"><i class=\"fa fa-trash-o fa-fw\"></i>Hapus Kualitas</a></li>" +
                "</ul>" +
                "</div>" +
                "</td>";
            if (j == 0) {
                dataTable = dataTable + "<td rowspan='" + listBlueprint[i]['kualitass'].length + "' scope='rowgroup'> " +
                    "<div class=\"btn-group\">" +
                    "<a class=\"btn btn-primary\" href=\"#!\">" +
                    "<i class=\"fa fa-pencil-square-o fa-fw\"></i> Aksi</a>" +
                    "<a class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" href=\"#!\">" +
                    "<span class=\"fa fa-caret-down\" title=\"Toggle dropdown menu\"></span>" +
                    "</a>" +
                    "<ul class=\"dropdown-menu\">" +
                    "<li><a href=\"#!\" class=\"addKualitas\" data-barang=\"" + listBlueprint[i]['kualitass'][j]["uid_barang"] + "\"><i class=\"fa fa-plus fa-fw\"></i>Tambah Kualitas</a></li>" +
                    "<li><a href=\"#!\" class=\"deleteBarang\"  data-barang=\"" + listBlueprint[i]['kualitass'][j]["uid_barang"] + "\"><i class=\"fa fa-trash-o fa-fw\"></i>Hapus Barang</a></li>" +
                    "</ul>" +
                    "</div>" +
                    "</td></tr>";
            }else{
                dataTable = dataTable + "</tr>";
            }
        }
    }
    //alert(dataTable);
    $("#blueprint").append(dataTable);
}

function addBarang(barangNama, barangKualitas) {
    $.ajax({
        url: urlbase+'/kuesioner/' + idKues + '/addBarang',
        type: 'POST',
        data: {
            barang: barangNama,
            kualitas: barangKualitas
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '0') {
                photo = "";
                $.notify({
                    message: 'gagal menambah barang'
                }, {
                    type: 'danger'
                });
            } else {
                var hasil = JSON.parse(data);
                $.notify({
                    message: 'sukses menambah barang'
                }, {
                    type: 'success'
                });
                var newData = {
                    uid_barang: hasil['uidBarang'],
                    uid_kualitas: hasil['uidKualitas'],
                    barang: barangNama,
                    kualitas: barangKualitas,
                    satuan_unit: '',
                    nilai_sewa: '',
                    keterangan: ''
                };
                listItemBlueprint.push(newData);
                arrange();
                loadHTML();
            }
        },
        error: function (data) {
            $.notify({
                message: 'gagal menambah barang'
            }, {
                type: 'danger'
            });
        }
    });
}

function addKualitas(uidBarang, barangNama, kualitasNama) {
    $.ajax({
        url: urlbase+'/kuesioner/' + idKues + '/addKualitas',
        type: 'POST',
        data: {
            uid_barang: uidBarang,
            barang: barangNama,
            kualitas: kualitasNama
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '0') {
                photo = "";
                $.notify({
                    message: 'gagal menambah kualitas'
                }, {
                    type: 'danger'
                });
            } else {
                var hasil = JSON.parse(data);
                $.notify({
                    message: 'sukses menambah kualitas'
                }, {
                    type: 'success'
                });
                var newData = {
                    uid_barang: uidBarang,
                    uid_kualitas: hasil['uidKualitas'],
                    barang: barangNama,
                    kualitas: kualitasNama,
                    satuan_unit: '',
                    nilai_sewa: '',
                    keterangan: ''
                };
                listItemBlueprint.push(newData);
                arrange();
                loadHTML();
            }
        },
        error: function (data) {
            $.notify({
                message: 'gagal menambah kualitas'
            }, {
                type: 'danger'
            });
        }
    });
}

function addIsiKolom(uidBarang, uidKualitas, index, action, isi) {
    if(action==2 && isi==''){
        action=3;
    }
    $.ajax({
        url: urlbase+'/kuesioner/' + idKues + '/action',
        type: 'POST',
        data: {
            idColumn: index,
            uid_barang: uidBarang,
            uid_kualitas: uidKualitas,
            idAction: action,
            isi: isi
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '0') {
                photo = "";
                $.notify({
                    message: 'gagal memperbarui kolom'
                }, {
                    type: 'danger'
                });
            } else {
                var hasil = JSON.parse(data);
                $.notify({
                    message: 'sukses memperbarui kolom'
                }, {
                    type: 'success'
                });
                var newData;
                for (var i = 0; i < listItemBlueprint.length; i++) {
                    if (listItemBlueprint[i]['uid_barang'] == uidBarang &&
                        listItemBlueprint[i]['uid_kualitas'] == uidKualitas) {
                        newData = listItemBlueprint[i];
                        if (index == 1) {
                            if (action == 1) {
                                newData['satuan_unit'] = '000-000';
                            } else if (action == 2) {
                                newData['satuan_unit'] = isi;
                            } else if (action == 3) {
                                newData['satuan_unit'] = '';
                            }
                        } else if (index == 2) {
                            if (action == 1) {
                                newData['nilai_sewa'] = '000-000';
                            } else if (action == 2) {
                                newData['nilai_sewa'] = isi;
                            } else if (action == 3) {
                                newData['nilai_sewa'] = '';
                            }
                        } else if (index == 3) {
                            if (action == 1) {
                                newData['keterangan'] = '000-000';
                            } else if (action == 2) {
                                newData['keterangan'] = isi;
                            } else if (action == 2) {
                                newData['keterangan'] = '';
                            }
                        } 
                        listItemBlueprint[i] = newData;
                        break;
                    }
                }
                arrange();
                loadHTML();
            }
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal memperbarui kolom'
            }, {
                type: 'danger'
            });
        }
    });
}

function hapusBarang(uidBarang) {
    $.ajax({
        url: urlbase+'/kuesioner/' + idKues + '/deleteBarang',
        type: 'POST',
        data: {
            uid_barang: uidBarang
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '1') {
                $.notify({
                    message: 'sukses menghapus barang'
                }, {
                    type: 'success'
                });
                var listItemBlueprintBaru = [];
                for (var i = 0; i < listItemBlueprint.length; i++) {
                    if (listItemBlueprint[i]['uid_barang'] != uidBarang) {
                        listItemBlueprintBaru.push(listItemBlueprint[i]);
                    }
                }
                listItemBlueprint = listItemBlueprintBaru;
                arrange();
                loadHTML();
            } else {
                photo = "";
                $.notify({
                    message: 'gagal menghapus barang'
                }, {
                    type: 'danger'
                });
            }
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal menghapus barang'
            }, {
                type: 'danger'
            });
        }
    });
}

function hapusKualitas(uidBarang, uidKualitas) {
    $.ajax({
        url: urlbase+'/kuesioner/' + idKues + '/deleteKualitas',
        type: 'POST',
        data: {
            uid_barang: uidBarang,
            uid_kualitas: uidKualitas
        },
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            if (data == '1') {
                $.notify({
                    message: 'sukses menghapus kualitas'
                }, {
                    type: 'success'
                });
                var listItemBlueprintBaru = [];
                for (var i = 0; i < listItemBlueprint.length; i++) {
                    if (listItemBlueprint[i]['uid_barang'] != uidBarang ||
                        listItemBlueprint[i]['uid_kualitas'] != uidKualitas) {
                        listItemBlueprintBaru.push(listItemBlueprint[i]);
                    }
                }
                listItemBlueprint = listItemBlueprintBaru;
                arrange();
                loadHTML();
            } else {
                photo = "";
                $.notify({
                    message: 'gagal menghapus kualitas'
                }, {
                    type: 'danger'
                });
            }
        },
        error: function (data) {
            photo = "";
            $.notify({
                message: 'gagal menghapus kualitas'
            }, {
                type: 'danger'
            });
        }
    });
}
var helper = {};
$(document).ready(function () {
    $( ".addBarang").on("click", function(){
        $("#barang1").val("");
        $("#kualitas1").val("");
        $('#tambahBarangModal').modal();
    });
    $('#tambahBarang').submit(function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            addBarang( $("#barang1").val(), $("#kualitas1").val());
            $('#tambahBarangModal').modal('hide');
        }
    });
    $("#blueprint").on("click",".addKualitas", function(){
        $('#kualitas2').val("");
        helper = {};
        helper['barang'] = $(this).data('barang');
        //alert('masukkkkk');
        $('#tambahKualitasModal').modal();
    });
    $('#tambahKualitas').submit(function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            var namaBarang;
            for(var i=0; i<listBlueprint.length; i++){
                if(listBlueprint[i]['uid_barang']==helper['barang']){
                    namaBarang = listBlueprint[i]['barang'];
                    break;
                }
            }
            addKualitas(helper['barang'], namaBarang, $('#kualitas2').val());
            helper = {};
            $('#kualitas2').val("");
            $('#tambahKualitasModal').modal('hide');
        }
    });
    $("#blueprint").on("click",".deleteBarang", function(){
        helper = {};
        helper['uid_barang'] = $(this).data('barang');
        var namaBarang;
        for(var i=0; i<listBlueprint.length; i++){
            if(listBlueprint[i]['uid_barang']==$(this).data('barang')){
                namaBarang = listBlueprint[i]['barang'];
                break;
            }
        }
        helper['barang'] = namaBarang;
        $("#namaBarang3").text(namaBarang);
        $('#hapusBarangModal').modal();
    });
    $('#hapusBarang').submit(function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            hapusBarang(helper['uid_barang']);
            helper = {};
            $('#hapusBarangModal').modal('hide');
        }
    });
    $("#blueprint").on("click", ".deleteKualitas", function(){
        helper = {};
        helper['uid_barang'] = $(this).data('barang');
        helper['uid_kualitas'] = $(this).data('kualitas');
        var namaBarang;
        var namaKualitas;
        for(var i=0; i<listBlueprint.length; i++){
            if(listBlueprint[i]['uid_barang']==$(this).data('barang')){
                namaBarang = listBlueprint[i]['barang'];
                for(var j=0; j<listBlueprint[i]['kualitass'].length; j++){
                    if(listBlueprint[i]['kualitass'][j]['uid_kualitas']==$(this).data('kualitas')){
                        namaKualitas = listBlueprint[i]['kualitass'][j]['kualitas'];
                        break
                    }
                }
                break;
            }
        }
        $("#namaBarang4").text(namaBarang);
        $("#namaKualitas4").text(namaKualitas);
        $('#hapusKualitasModal').modal();
    });
    $('#hapusKualitas').submit(function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            hapusKualitas(helper['uid_barang'], helper['uid_kualitas']);
            helper = {};
            $('#hapusKualitasModal').modal('hide');
        }
    });
    $("#blueprint").on("dblclick", ".columnEditable", function(){
        helper = {};
        helper['uid_barang'] = $(this).data('barang');
        helper['uid_kualitas'] = $(this).data('kualitas');
        helper['index'] = $(this).data('index');
        var namaBarang;
        var namaKualitas;
        for(var i=0; i<listBlueprint.length; i++){
            if(listBlueprint[i]['uid_barang']==$(this).data('barang')){
                namaBarang = listBlueprint[i]['barang'];
                for(var j=0; j<listBlueprint[i]['kualitass'].length; j++){
                    if(listBlueprint[i]['kualitass'][j]['uid_kualitas']==$(this).data('kualitas')){
                        namaKualitas = listBlueprint[i]['kualitass'][j]['kualitas'];
                        break
                    }
                }
                break;
            }
        }
        // $("#namaBarang4").text(namaBarang);
        $("#tipe5").val("2");
        $("#isi5").val("");
        $('#isiGroup').removeClass('hidden');
        $("#namaKualitas5").text(namaKualitas);
        $('#ubahIsiModal').modal();
    });
    $('#ubahIsi').submit(function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            addIsiKolom(helper['uid_barang'], helper['uid_kualitas'], helper['index'], 
                $("#tipe5").val(), $("#isi5").val())
            helper = {};
            $('#ubahIsiModal').modal('hide');
        }
    });
    $("#ubahIsiModal" ).on( 'change', "#tipe5", function(){
        if($(this).val() == "2"){
            $('#isiGroup').removeClass('hidden');
        }else if($(this).val() == "1"){
            $('#isiGroup').addClass('hidden');
            $("#isi5").val("");
        }
    });
});
