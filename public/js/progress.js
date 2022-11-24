function loadHTML(){
    $('#userContent').html("");
    if(listProgress!=null){
        if(listProgress.length>0){
            var data = "";
            for (var i = 0; i < listProgress.length; i++) {
                data = data +"<tr>"
                +"<td style=\"width: 30px;\">"+(i+1)+"</td>"
                +"<td style=\"width: 100px;\">"+listProgress[i]["nama"]+"</td>";
                if(listProgress[i]["tipeResponden"] == '1'){
                    data = data +"<td style=\"width: 90px;\">Toko Bangunan</td>";
                }else if(listProgress[i]["tipeResponden"] == '2'){
                    data = data +"<td style=\"width: 90px;\">Bahan Material</td>";
                }else if(listProgress[i]["tipeResponden"] == '3'){
                    data = data +"<td style=\"width: 90px;\">Toko Kayu/Kuseng</td>";
                }else if(listProgress[i]["tipeResponden"] == '4'){
                    data = data +"<td style=\"width: 90px;\">Toko Kaca</td>";
                }else if(listProgress[i]["tipeResponden"] == '5'){
                    data = data +"<td style=\"width: 90px;\">Sewa Alat Berat</td>";
                }else if(listProgress[i]["tipeResponden"] == '6'){
                    data = data +"<td style=\"width: 90px;\">Toko Aluminium</td>";
                }else if(listProgress[i]["tipeResponden"] == '7'){
                    data = data +"<td style=\"width: 90px;\">Upah Jasa Konstruksi</td>";
                }
                if(listProgress[i]["nipPetugas"] == null){
                    data = data +"<td style=\"width: 90px;\">Isi Sendiri</td>";
                }else{
                    data = data +"<td style=\"width: 90px;\">"+getNama(listProgress[i]["nipPetugas"])+"</td>";
                }
                if(!listProgress[i].hasOwnProperty('edited')){
                    data = data +"<td style=\"width: 90px;\">0</td>";
                }else{
                    data = data +"<td style=\"width: 90px;\">"+listProgress[i]["edited"]+"</td>";
                }
                if(!listProgress[i].hasOwnProperty('submit')){
                    data = data +"<td style=\"width: 90px;\">0</td>";
                }else{
                    data = data +"<td style=\"width: 90px;\">"+listProgress[i]["submit"]+"</td>";
                }
                data = data +"<td style=\"width: 90px;\">"+listProgress[i]["all"]+"</td>";
            }
            $('#userContent').html(data);
        }
    }
    $('#userContent').after();
}
function getNama(nip){
    for(var i=0; listPetugas.length; i++){
        if(listPetugas[i]['nip']==nip){
            return listPetugas[i]['nama'];
        }
    }
}