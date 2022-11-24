var listResponden1 = [];
var listResponden2 = [];
var listResponden3 = [];
var listResponden4 = [];
var listResponden5 = [];
var listResponden6 = [];
var listResponden7 = [];

function arrange() {
    listResponden1 = [];
    listResponden2 = [];
    listResponden3 = [];
    listResponden4 = [];
    listResponden5 = [];
    listResponden6 = [];
    listResponden7 = [];
    console.log(JSON.stringify(listRespondenTipe1));
    for (var i = 0; i < listRespondenTipe1.length; i++) {
        if (listRespondenTipe1[i]['tipe'] == '1') {
            var sudahAdaBarang = false;
            for (var j = 0; j < listResponden1.length; j++) {
                if (listResponden1[j]['uid_barang'] == listRespondenTipe1[i]['uid_barang']) {
                    sudahAdaBarang = true;
                    var sudahAdaKualitas = false;
                    for (var k = 0; k<listResponden1[j]['kualitass'].length; k++) {
                        if (listResponden1[j]['kualitass'][k]['uid_kualitas'] == listRespondenTipe1[i]['uid_kualitas']) {
                            listResponden1[j]['kualitass'][k]['responden'].push(listRespondenTipe1[i]);
                            sudahAdaKualitas = true;
                            break;
                        }
                    }
                    if (!sudahAdaKualitas) {
                        var newDataKualitas = {
                            uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                            kualitas: listRespondenTipe1[i]['kualitas'],
                            responden: []
                        };
                        newDataKualitas['responden'].push(listRespondenTipe1[i]);
                        listResponden1[j]['kualitass'].push(newDataKualitas);
                    }
                    break
                }
            }
            if (!sudahAdaBarang) {
                //belumAdabarang
                var newDataKualitas = {
                    uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                    kualitas: listRespondenTipe1[i]['kualitas'],
                    responden: []
                };
                newDataKualitas['responden'].push(listRespondenTipe1[i]);
                var newDataBarang = {
                    uid_barang: listRespondenTipe1[i]['uid_barang'],
                    barang: listRespondenTipe1[i]['barang'],
                    kualitass: []
                };
                newDataBarang['kualitass'].push(newDataKualitas);
                listResponden1.push(newDataBarang);
            }
        } else if (listRespondenTipe1[i]['tipe'] == '2') {
            var sudahAdaBarang = false;
            for (var j = 0; j < listResponden2.length; j++) {
                if (listResponden2[j]['uid_barang'] == listRespondenTipe1[i]['uid_barang']) {
                    sudahAdaBarang = true;
                    var sudahAdaKualitas = false;
                    for (var k = 0; k<listResponden2[j]['kualitass'].length; k++) {
                        if (listResponden2[j]['kualitass'][k]['uid_kualitas'] == listRespondenTipe1[i]['uid_kualitas']) {
                            listResponden2[j]['kualitass'][k]['responden'].push(listRespondenTipe1[i]);
                            sudahAdaKualitas = true;
                            break;
                        }
                    }
                    if (!sudahAdaKualitas) {
                        var newDataKualitas = {
                            uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                            kualitas: listRespondenTipe1[i]['kualitas'],
                            responden: []
                        };
                        newDataKualitas['responden'].push(listRespondenTipe1[i]);
                        listResponden2[j]['kualitass'].push(newDataKualitas);
                    }
                    break
                }
            }
            if (!sudahAdaBarang) {
                //belumAdabarang
                var newDataKualitas = {
                    uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                    kualitas: listRespondenTipe1[i]['kualitas'],
                    responden: []
                };
                newDataKualitas['responden'].push(listRespondenTipe1[i]);
                var newDataBarang = {
                    uid_barang: listRespondenTipe1[i]['uid_barang'],
                    barang: listRespondenTipe1[i]['barang'],
                    kualitass: []
                };
                newDataBarang['kualitass'].push(newDataKualitas);
                listResponden2.push(newDataBarang);
            }
        } else if (listRespondenTipe1[i]['tipe'] == '3') {
            var sudahAdaBarang = false;
            for (var j = 0; j < listResponden3.length; j++) {
                if (listResponden3[j]['uid_barang'] == listRespondenTipe1[i]['uid_barang']) {
                    sudahAdaBarang = true;
                    var sudahAdaKualitas = false;
                    for (var k = 0; k<listResponden3[j]['kualitass'].length; k++) {
                        if (listResponden3[j]['kualitass'][k]['uid_kualitas'] == listRespondenTipe1[i]['uid_kualitas']) {
                            listResponden3[j]['kualitass'][k]['responden'].push(listRespondenTipe1[i]);
                            sudahAdaKualitas = true;
                            break;
                        }
                    }
                    if (!sudahAdaKualitas) {
                        var newDataKualitas = {
                            uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                            kualitas: listRespondenTipe1[i]['kualitas'],
                            responden: []
                        };
                        newDataKualitas['responden'].push(listRespondenTipe1[i]);
                        listResponden3[j]['kualitass'].push(newDataKualitas);
                    }
                    break
                }
            }
            if (!sudahAdaBarang) {
                //belumAdabarang
                var newDataKualitas = {
                    uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                    kualitas: listRespondenTipe1[i]['kualitas'],
                    responden: []
                };
                newDataKualitas['responden'].push(listRespondenTipe1[i]);
                var newDataBarang = {
                    uid_barang: listRespondenTipe1[i]['uid_barang'],
                    barang: listRespondenTipe1[i]['barang'],
                    kualitass: []
                };
                newDataBarang['kualitass'].push(newDataKualitas);
                listResponden3.push(newDataBarang);
            }
        } else if (listRespondenTipe1[i]['tipe'] == '4') {
            var sudahAdaBarang = false;
            for (var j = 0; j < listResponden4.length; j++) {
                if (listResponden4[j]['uid_barang'] == listRespondenTipe1[i]['uid_barang']) {
                    sudahAdaBarang = true;
                    var sudahAdaKualitas = false;
                    for (var k = 0; k<listResponden4[j]['kualitass'].length; k++) {
                        if (listResponden4[j]['kualitass'][k]['uid_kualitas'] == listRespondenTipe1[i]['uid_kualitas']) {
                            listResponden4[j]['kualitass'][k]['responden'].push(listRespondenTipe1[i]);
                            sudahAdaKualitas = true;
                            break;
                        }
                    }
                    if (!sudahAdaKualitas) {
                        var newDataKualitas = {
                            uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                            kualitas: listRespondenTipe1[i]['kualitas'],
                            responden: []
                        };
                        newDataKualitas['responden'].push(listRespondenTipe1[i]);
                        listResponden4[j]['kualitass'].push(newDataKualitas);
                    }
                    break
                }
            }
            if (!sudahAdaBarang) {
                //belumAdabarang
                var newDataKualitas = {
                    uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                    kualitas: listRespondenTipe1[i]['kualitas'],
                    responden: []
                };
                newDataKualitas['responden'].push(listRespondenTipe1[i]);
                var newDataBarang = {
                    uid_barang: listRespondenTipe1[i]['uid_barang'],
                    barang: listRespondenTipe1[i]['barang'],
                    kualitass: []
                };
                newDataBarang['kualitass'].push(newDataKualitas);
                listResponden4.push(newDataBarang);
            }
        } else if (listRespondenTipe1[i]['tipe'] == '6') {
            var sudahAdaBarang = false;
            for (var j = 0; j < listResponden6.length; j++) {
                if (listResponden6[j]['uid_barang'] == listRespondenTipe1[i]['uid_barang']) {
                    sudahAdaBarang = true;
                    var sudahAdaKualitas = false;
                    for (var k = 0; k<listResponden6[j]['kualitass'].length; k++) {
                        if (listResponden6[j]['kualitass'][k]['uid_kualitas'] == listRespondenTipe1[i]['uid_kualitas']) {
                            listResponden6[j]['kualitass'][k]['responden'].push(listRespondenTipe1[i]);
                            sudahAdaKualitas = true;
                            break;
                        }
                    }
                    if (!sudahAdaKualitas) {
                        var newDataKualitas = {
                            uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                            kualitas: listRespondenTipe1[i]['kualitas'],
                            responden: []
                        };
                        newDataKualitas['responden'].push(listRespondenTipe1[i]);
                        listResponden6[j]['kualitass'].push(newDataKualitas);
                    }
                    break
                }
            }
            if (!sudahAdaBarang) {
                //belumAdabarang
                var newDataKualitas = {
                    uid_kualitas: listRespondenTipe1[i]['uid_kualitas'],
                    kualitas: listRespondenTipe1[i]['kualitas'],
                    responden: []
                };
                newDataKualitas['responden'].push(listRespondenTipe1[i]);
                var newDataBarang = {
                    uid_barang: listRespondenTipe1[i]['uid_barang'],
                    barang: listRespondenTipe1[i]['barang'],
                    kualitass: []
                };
                newDataBarang['kualitass'].push(newDataKualitas);
                listResponden6.push(newDataBarang);
            }
        }
    }
    for (var i = 0; i < listRespondenTipe2.length; i++) {
        if (listRespondenTipe2[i]['tipe'] == '5') {
            var sudahAdaBarang = false;
            for (var j = 0; j < listResponden5.length; j++) {
                if (listResponden5[j]['uid_barang'] == listRespondenTipe2[i]['uid_barang']) {
                    sudahAdaBarang = true;
                    var sudahAdaKualitas = false;
                    for (var k = 0; k<listResponden5[j]['kualitass'].length; k++) {
                        if (listResponden5[j]['kualitass'][k]['uid_kualitas'] == listRespondenTipe2[i]['uid_kualitas']) {
                            listResponden5[j]['kualitass'][k]['responden'].push(listRespondenTipe2[i]);
                            sudahAdaKualitas = true;
                            break;
                        }
                    }
                    if (!sudahAdaKualitas) {
                        var newDataKualitas = {
                            uid_kualitas: listRespondenTipe2[i]['uid_kualitas'],
                            kualitas: listRespondenTipe2[i]['kualitas'],
                            responden: []
                        };
                        newDataKualitas['responden'].push(listRespondenTipe2[i]);
                        listResponden5[j]['kualitass'].push(newDataKualitas);
                    }
                    break
                }
            }
            if (!sudahAdaBarang) {
                //belumAdabarang
                var newDataKualitas = {
                    uid_kualitas: listRespondenTipe2[i]['uid_kualitas'],
                    kualitas: listRespondenTipe2[i]['kualitas'],
                    responden: []
                };
                newDataKualitas['responden'].push(listRespondenTipe2[i]);
                var newDataBarang = {
                    uid_barang: listRespondenTipe2[i]['uid_barang'],
                    barang: listRespondenTipe2[i]['barang'],
                    kualitass: []
                };
                newDataBarang['kualitass'].push(newDataKualitas);
                listResponden5.push(newDataBarang);
            }
        } else if (listRespondenTipe2[i]['tipe'] == '7') {
            var sudahAdaBarang = false;
            for (var j = 0; j < listResponden7.length; j++) {
                if (listResponden7[j]['uid_barang'] == listRespondenTipe2[i]['uid_barang']) {
                    sudahAdaBarang = true;
                    var sudahAdaKualitas = false;
                    for (var k = 0; k<listResponden7[j]['kualitass'].length; k++) {
                        if (listResponden7[j]['kualitass'][k]['uid_kualitas'] == listRespondenTipe2[i]['uid_kualitas']) {
                            listResponden7[j]['kualitass'][k]['responden'].push(listRespondenTipe2[i]);
                            sudahAdaKualitas = true;
                            break;
                        }
                    }
                    if (!sudahAdaKualitas) {
                        var newDataKualitas = {
                            uid_kualitas: listRespondenTipe2[i]['uid_kualitas'],
                            kualitas: listRespondenTipe2[i]['kualitas'],
                            responden: []
                        };
                        newDataKualitas['responden'].push(listRespondenTipe2[i]);
                        listResponden7[j]['kualitass'].push(newDataKualitas);
                    }
                    break
                }
            }
            if (!sudahAdaBarang) {
                //belumAdabarang
                var newDataKualitas = {
                    uid_kualitas: listRespondenTipe2[i]['uid_kualitas'],
                    kualitas: listRespondenTipe2[i]['kualitas'],
                    responden: []
                };
                newDataKualitas['responden'].push(listRespondenTipe2[i]);
                var newDataBarang = {
                    uid_barang: listRespondenTipe2[i]['uid_barang'],
                    barang: listRespondenTipe2[i]['barang'],
                    kualitass: []
                };
                newDataBarang['kualitass'].push(newDataKualitas);
                listResponden7.push(newDataBarang);
            }
        } 
    }
    //console.log(JSON.stringify(listResponden7));
}

function loadHTML1() {
    $("#tokobangunan").html("<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<colgroup span=\"4\"></colgroup>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<tr>" +
        "<th rowspan=\"2\">Barang</th>" +
        "<th rowspan=\"2\">Kualitas</th>" +
        "<th rowspan=\"2\">Responden</th>" +
        "<th rowspan=\"2\">Petugas</th>" +
        "<th rowspan=\"2\">Satuan Standar</th>" +
        "<th rowspan=\"2\">Merk</th>" +
        "<th rowspan=\"2\">Satuan Setempat</th>" +
        "<th rowspan=\"1\" colspan=\"4\" scope=\"colgroup\">Ukuran Setempat</th>" +
        "<th rowspan=\"2\">Konversi</th>" +
        "<th rowspan=\"2\">Harga Setempat</th>" +
        "<th rowspan=\"2\">Harga Standar</th>" +
        "<th rowspan=\"2\">Keterangan</th>" +
        "</tr>" +
        "<tr>" +
        "<th scope=\"col\">Panjang</th>" +
        "<th scope=\"col\">Lebar</th>" +
        "<th scope=\"col\">Tinggi</th>" +
        "<th scope=\"col\">Berat</th>" +
        "</tr>");
    var dataTable = "";
    var listBlueprint = listResponden1;
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j < listBlueprint[i]['kualitass'].length; j++) {
            for (var k = 0; k < listBlueprint[i]['kualitass'][j]['responden'].length; k++) {
                if(j==0 && k==0){
                    dataTable = dataTable + "<tr><th rowspan='" + (listBlueprint[i]['kualitass'].length * listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['barang'] + "</th>";
                    dataTable = dataTable + "<td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else if(k==0){
                    dataTable = dataTable + "<tr><td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else{
                    dataTable = dataTable + "<tr>";
                }
                dataTable = dataTable + "<td>" + getNamaResponden(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                dataTable = dataTable + "<td>" + getNamaPetugasLevel1(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='1'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='1'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='2'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='2'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='3'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='3'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='4'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='4'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='5'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='5'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='6'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='6'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='7'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='7'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='8'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='8'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='9'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='9'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='10'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='10'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='11'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='11'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] + "</td>";
                }
                if(j==0 && k==0){
                    dataTable = dataTable + "</tr>";
                }else if(k==0){
                    dataTable = dataTable + "</tr>"
                }else{
                    dataTable = dataTable + "</tr>"
                }
            }
        }
    }
    //alert(dataTable);
    $("#tokobangunan").append(dataTable);
}
function loadHTML2() {
    $("#bahanmaterial").html("<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<colgroup span=\"4\"></colgroup>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<tr>" +
        "<th rowspan=\"2\">Barang</th>" +
        "<th rowspan=\"2\">Kualitas</th>" +
        "<th rowspan=\"2\">Responden</th>" +
        "<th rowspan=\"2\">Petugas</th>" +
        "<th rowspan=\"2\">Satuan Standar</th>" +
        "<th rowspan=\"2\">Merk</th>" +
        "<th rowspan=\"2\">Satuan Setempat</th>" +
        "<th rowspan=\"1\" colspan=\"4\" scope=\"colgroup\">Ukuran Setempat</th>" +
        "<th rowspan=\"2\">Konversi</th>" +
        "<th rowspan=\"2\">Harga Setempat</th>" +
        "<th rowspan=\"2\">Harga Standar</th>" +
        "<th rowspan=\"2\">Keterangan</th>" +
        "</tr>" +
        "<tr>" +
        "<th scope=\"col\">Panjang</th>" +
        "<th scope=\"col\">Lebar</th>" +
        "<th scope=\"col\">Tinggi</th>" +
        "<th scope=\"col\">Berat</th>" +
        "</tr>");
    var dataTable = "";
    var listBlueprint = listResponden2;
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j < listBlueprint[i]['kualitass'].length; j++) {
            for (var k = 0; k < listBlueprint[i]['kualitass'][j]['responden'].length; k++) {
                if(j==0 && k==0){
                    dataTable = dataTable + "<tr><th rowspan='" + (listBlueprint[i]['kualitass'].length * listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['barang'] + "</th>";
                    dataTable = dataTable + "<td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else if(k==0){
                    dataTable = dataTable + "<tr><td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else{
                    dataTable = dataTable + "<tr>";
                }
                dataTable = dataTable + "<td>" + getNamaResponden(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                dataTable = dataTable + "<td>" + getNamaPetugasLevel1(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='1'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='1'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='2'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='2'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='3'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='3'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='4'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='4'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='5'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='5'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='6'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='6'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='7'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='7'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='8'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='8'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='9'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='9'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='10'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='10'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='11'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='11'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] + "</td>";
                }
                if(j==0 && k==0){
                    dataTable = dataTable + "</tr>";
                }else if(k==0){
                    dataTable = dataTable + "</tr>"
                }else{
                    dataTable = dataTable + "</tr>"
                }
            }
        }
    }
    //alert(dataTable);
    $("#bahanmaterial").append(dataTable);
}
function loadHTML3() {
    $("#kayuKuseng").html("<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<colgroup span=\"4\"></colgroup>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<tr>" +
        "<th rowspan=\"2\">Barang</th>" +
        "<th rowspan=\"2\">Kualitas</th>" +
        "<th rowspan=\"2\">Responden</th>" +
        "<th rowspan=\"2\">Petugas</th>" +
        "<th rowspan=\"2\">Satuan Standar</th>" +
        "<th rowspan=\"2\">Merk</th>" +
        "<th rowspan=\"2\">Satuan Setempat</th>" +
        "<th rowspan=\"1\" colspan=\"4\" scope=\"colgroup\">Ukuran Setempat</th>" +
        "<th rowspan=\"2\">Konversi</th>" +
        "<th rowspan=\"2\">Harga Setempat</th>" +
        "<th rowspan=\"2\">Harga Standar</th>" +
        "<th rowspan=\"2\">Keterangan</th>" +
        "</tr>" +
        "<tr>" +
        "<th scope=\"col\">Panjang</th>" +
        "<th scope=\"col\">Lebar</th>" +
        "<th scope=\"col\">Tinggi</th>" +
        "<th scope=\"col\">Berat</th>" +
        "</tr>");
    var dataTable = "";
    var listBlueprint = listResponden3;
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j < listBlueprint[i]['kualitass'].length; j++) {
            for (var k = 0; k < listBlueprint[i]['kualitass'][j]['responden'].length; k++) {
                if(j==0 && k==0){
                    dataTable = dataTable + "<tr><th rowspan='" + (listBlueprint[i]['kualitass'].length * listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['barang'] + "</th>";
                    dataTable = dataTable + "<td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else if(k==0){
                    dataTable = dataTable + "<tr><td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else{
                    dataTable = dataTable + "<tr>";
                }
                dataTable = dataTable + "<td>" + getNamaResponden(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                dataTable = dataTable + "<td>" + getNamaPetugasLevel1(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='1'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='1'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='2'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='2'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='3'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='3'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='4'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='4'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='5'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='5'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='6'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='6'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='7'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='7'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='8'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='8'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='9'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='9'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='10'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='10'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='11'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='11'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] + "</td>";
                }
                if(j==0 && k==0){
                    dataTable = dataTable + "</tr>";
                }else if(k==0){
                    dataTable = dataTable + "</tr>"
                }else{
                    dataTable = dataTable + "</tr>"
                }
            }
        }
    }
    //alert(dataTable);
    $("#kayuKuseng").append(dataTable);
}
function loadHTML4() {
    $("#tokoKaca").html("<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<colgroup span=\"4\"></colgroup>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<tr>" +
        "<th rowspan=\"2\">Barang</th>" +
        "<th rowspan=\"2\">Kualitas</th>" +
        "<th rowspan=\"2\">Responden</th>" +
        "<th rowspan=\"2\">Petugas</th>" +
        "<th rowspan=\"2\">Satuan Standar</th>" +
        "<th rowspan=\"2\">Merk</th>" +
        "<th rowspan=\"2\">Satuan Setempat</th>" +
        "<th rowspan=\"1\" colspan=\"4\" scope=\"colgroup\">Ukuran Setempat</th>" +
        "<th rowspan=\"2\">Konversi</th>" +
        "<th rowspan=\"2\">Harga Setempat</th>" +
        "<th rowspan=\"2\">Harga Standar</th>" +
        "<th rowspan=\"2\">Keterangan</th>" +
        "</tr>" +
        "<tr>" +
        "<th scope=\"col\">Panjang</th>" +
        "<th scope=\"col\">Lebar</th>" +
        "<th scope=\"col\">Tinggi</th>" +
        "<th scope=\"col\">Berat</th>" +
        "</tr>");
    var dataTable = "";
    var listBlueprint = listResponden4;
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j < listBlueprint[i]['kualitass'].length; j++) {
            for (var k = 0; k < listBlueprint[i]['kualitass'][j]['responden'].length; k++) {
                if(j==0 && k==0){
                    dataTable = dataTable + "<tr><th rowspan='" + (listBlueprint[i]['kualitass'].length * listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['barang'] + "</th>";
                    dataTable = dataTable + "<td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else if(k==0){
                    dataTable = dataTable + "<tr><td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else{
                    dataTable = dataTable + "<tr>";
                }
                dataTable = dataTable + "<td>" + getNamaResponden(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                dataTable = dataTable + "<td>" + getNamaPetugasLevel1(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='1'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='1'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='2'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='2'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='3'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='3'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='4'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='4'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='5'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='5'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='6'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='6'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='7'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='7'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='8'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='8'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='9'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='9'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='10'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='10'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='11'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='11'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] + "</td>";
                }
                if(j==0 && k==0){
                    dataTable = dataTable + "</tr>";
                }else if(k==0){
                    dataTable = dataTable + "</tr>"
                }else{
                    dataTable = dataTable + "</tr>"
                }
            }
        }
    }
    //alert(dataTable);
    $("#tokoKaca").append(dataTable);
}
function loadHTML6() {
    $("#alumunium").html("<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<colgroup span=\"4\"></colgroup>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<col>" +
        "<tr>" +
        "<th rowspan=\"2\">Barang</th>" +
        "<th rowspan=\"2\">Kualitas</th>" +
        "<th rowspan=\"2\">Responden</th>" +
        "<th rowspan=\"2\">Petugas</th>" +
        "<th rowspan=\"2\">Satuan Standar</th>" +
        "<th rowspan=\"2\">Merk</th>" +
        "<th rowspan=\"2\">Satuan Setempat</th>" +
        "<th rowspan=\"1\" colspan=\"4\" scope=\"colgroup\">Ukuran Setempat</th>" +
        "<th rowspan=\"2\">Konversi</th>" +
        "<th rowspan=\"2\">Harga Setempat</th>" +
        "<th rowspan=\"2\">Harga Standar</th>" +
        "<th rowspan=\"2\">Keterangan</th>" +
        "</tr>" +
        "<tr>" +
        "<th scope=\"col\">Panjang</th>" +
        "<th scope=\"col\">Lebar</th>" +
        "<th scope=\"col\">Tinggi</th>" +
        "<th scope=\"col\">Berat</th>" +
        "</tr>");
    var dataTable = "";
    var listBlueprint = listResponden6;
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j < listBlueprint[i]['kualitass'].length; j++) {
            for (var k = 0; k < listBlueprint[i]['kualitass'][j]['responden'].length; k++) {
                if(j==0 && k==0){
                    dataTable = dataTable + "<tr><th rowspan='" + (listBlueprint[i]['kualitass'].length * listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['barang'] + "</th>";
                    dataTable = dataTable + "<td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else if(k==0){
                    dataTable = dataTable + "<tr><td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else{
                    dataTable = dataTable + "<tr>";
                }
                dataTable = dataTable + "<td>" + getNamaResponden(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                dataTable = dataTable + "<td>" + getNamaPetugasLevel1(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='1'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='1'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='2'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='2'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['merk'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='3'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='3'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='4'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='4'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_panjang'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='5'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='5'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_lebar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='6'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='6'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_tinggi'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='7'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='7'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['ukuran_berat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='8'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='8'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['konversi_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='9'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='9'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_setempat'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='10'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='10'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['harga_satuan_standar'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='11'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='11'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] + "</td>";
                }
                if(j==0 && k==0){
                    dataTable = dataTable + "</tr>";
                }else if(k==0){
                    dataTable = dataTable + "</tr>"
                }else{
                    dataTable = dataTable + "</tr>"
                }
            }
        }
    }
    //alert(dataTable);
    $("#alumunium").append(dataTable);
}

function loadHTML5() {
    $("#alatBerat").html("<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<tr>"
        +"<th>Barang</th>"
        +"<th>Kualitas</th>"
        +"<th>Responden</th>"
        +"<th>Petugas</th>"
        +"<th>Satuan Unit</th>"
        +"<th>Nilai Sewa</th>"
        +"<th>Keterangan</th>"
        +"</tr>");
    var dataTable = "";
    var listBlueprint = listResponden5;
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j < listBlueprint[i]['kualitass'].length; j++) {
            for (var k = 0; k < listBlueprint[i]['kualitass'][j]['responden'].length; k++) {
                if(j==0 && k==0){
                    dataTable = dataTable + "<tr><th rowspan='" + (listBlueprint[i]['kualitass'].length * listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['barang'] + "</th>";
                    dataTable = dataTable + "<td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else if(k==0){
                    dataTable = dataTable + "<tr><td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else{
                    dataTable = dataTable + "<tr>";
                }
                dataTable = dataTable + "<td>" + getNamaResponden(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                dataTable = dataTable + "<td>" + getNamaPetugasLevel1(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_unit'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='1'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='1'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_unit'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['nilai_sewa'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='2'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='2'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['nilai_sewa'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='11'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='11'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] + "</td>";
                }
                if(j==0 && k==0){
                    dataTable = dataTable + "</tr>";
                }else if(k==0){
                    dataTable = dataTable + "</tr>"
                }else{
                    dataTable = dataTable + "</tr>"
                }
            }
        }
    }
    //alert(dataTable);
    $("#alatBerat").append(dataTable);
}
function loadHTML7() {
    $("#upahJasa").html("<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<col>"
    +"<tr>"
        +"<th>Barang</th>"
        +"<th>Kualitas</th>"
        +"<th>Responden</th>"
        +"<th>Petugas</th>"
        +"<th>Satuan Unit</th>"
        +"<th>Nilai Sewa</th>"
        +"<th>Keterangan</th>"
        +"</tr>");
    var dataTable = "";
    var listBlueprint = listResponden7;
    for (var i = 0; i < listBlueprint.length; i++) {
        for (var j = 0; j < listBlueprint[i]['kualitass'].length; j++) {
            for (var k = 0; k < listBlueprint[i]['kualitass'][j]['responden'].length; k++) {
                if(j==0 && k==0){
                    dataTable = dataTable + "<tr><th rowspan='" + (listBlueprint[i]['kualitass'].length * listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['barang'] + "</th>";
                    dataTable = dataTable + "<td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else if(k==0){
                    dataTable = dataTable + "<tr><td rowspan='" + (listBlueprint[i]['kualitass'][0]['responden'].length) + "' scope='rowgroup'>" + listBlueprint[i]['kualitass'][j]['kualitas'] + "</td>";
                }else{
                    dataTable = dataTable + "<tr>";
                }
                dataTable = dataTable + "<td>" + getNamaResponden(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                dataTable = dataTable + "<td>" + getNamaPetugasLevel1(listBlueprint[i]['kualitass'][j]['responden'][k]['id_responden']) + "</td>";
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_unit'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='1'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='1'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['satuan_unit'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['nilai_sewa'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='2'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='2'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['nilai_sewa'] + "</td>";
                }
                if (listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] == '000-000') {
                    dataTable = dataTable + "<td bgcolor='#b9c0cc' class='columnEditable' " +
                        "data-index='11'></td>";
                } else {
                    dataTable = dataTable + "<td class='columnEditable' " +
                        "data-index='11'>" + listBlueprint[i]['kualitass'][j]['responden'][k]['keterangan'] + "</td>";
                }
                if(j==0 && k==0){
                    dataTable = dataTable + "</tr>";
                }else if(k==0){
                    dataTable = dataTable + "</tr>"
                }else{
                    dataTable = dataTable + "</tr>"
                }
            }
        }
    }
    //alert(dataTable);
    $("#upahJasa").append(dataTable);
}
function getNamaPetugasLevel2(nip) {
    if(nip==null){
        return 'Isi Sendiri'
    }
    for (var i = 0; listPetugas.length; i++) {
        if (listPetugas[i]['nip'] == nip) {
            return listPetugas[i]['nama'];
        }
    }
}
function getNamaPetugasLevel1(id_responden) {
    for (var i = 0; listResponden.length; i++) {
        if (listResponden[i]['id'] == id_responden) {
            return getNamaPetugasLevel2(listResponden[i]['nipPetugas']);
        }
    }
}
function getNamaResponden(id_responden) {
    for (var i = 0; listResponden.length; i++) {
        if (listResponden[i]['id'] == id_responden) {
            return listResponden[i]['nama'];
        }
    }
}
