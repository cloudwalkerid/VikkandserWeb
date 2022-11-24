<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Webpatser\Uuid\Uuid;

class Kuesioner extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        if (!Auth::check()) {
            return redirect()->action('Auth\LoginController@showLoginForm');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $idKues)
    {
        if(Auth::user()->tipePengguna == 0){
            Auth::logout();
            return redirect()->action('Auth\LoginController@showLoginForm');
        }
        $surveis = DB::table('survei')->count();
        if($surveis == 0){
            $data = array();
            $data ['urlbase'] = Config::get('app.url');
            return view('kosong', $data);
        }
        $listSurvei = DB::table('survei')->get();
        if ($request->session()->has('uid_survei')) {
            $item = DB::table('survei')
                ->where('uid', $request->session()->get('uid_survei'))
                ->first();
            $data = array();
            $data ['indexurl'] = 2;
            $data ['indexkues'] = $idKues;
            $data ['title'] = 'Kuesioner';
            $data ['selectedSurvei'] = $item;
            $data ['listSurvei'] = $listSurvei;
            $data ['urlbase'] = Config::get('app.url');
            if($idKues != '7' && $idKues != '5'){
                $itemBlueprint =  DB::table('blueprint_tipe1')
                    ->where('tipe', $idKues)
                    ->orderBy('created_at')
                    ->get();
                $data ['itemBlueprint'] = $itemBlueprint;
                return view('kuesioner1', $data);
            }else{
                $itemBlueprint =  DB::table('blueprint_tipe2')
                    ->where('tipe', $idKues)
                    ->orderBy('created_at')
                    ->get();
                $data ['itemBlueprint'] = $itemBlueprint;
                return view('kuesioner2', $data);
            }
        }else{
            $item = DB::table('survei')
                    ->orderBy('uid', 'desc')
                    ->first();
            $request->session()->put('uid_survei', $item->uid);
            $data = array();
            $data ['indexurl'] = 2;
            $data ['indexkues'] = $idKues;
            $data ['title'] = 'Kuesioner';
            $data ['selectedSurvei'] = $item;
            $data ['listSurvei'] = $listSurvei;
            $data ['urlbase'] = Config::get('app.url');
            if($idKues != '7' && $idKues != '5'){
                $itemBlueprint =  DB::table('blueprint_tipe1')
                    ->where('tipe', $idKues)
                    ->orderBy('created_at')
                    ->get();
                $data ['itemBlueprint'] = $itemBlueprint;
                return view('kuesioner1', $data);
            }else{
                $itemBlueprint =  DB::table('blueprint_tipe2')
                    ->where('tipe', $idKues)
                    ->orderBy('created_at')
                    ->get();
                $data ['itemBlueprint'] = $itemBlueprint;
                return view('kuesioner2', $data);
            }
        }
    }
    public function addBarang(Request $request, $idKues)
    {
        $berhasil = false;
        $uidBarang = Uuid::generate()->string;
        $uidKualitas = Uuid::generate()->string;
        $hasil = array();
        $hasil['uidBarang'] = $uidBarang;
        $hasil['uidKualitas'] = $uidKualitas;
        DB::beginTransaction();
        if($idKues != '5' && $idKues != '7'){
            try {
                DB::table('blueprint_tipe1')->insert(
                    ['uid_barang' => $uidBarang
                    ,'uid_kualitas' => $uidKualitas
                    ,'tipe' => $idKues
                    ,'barang' => $request->barang
                    ,'kualitas' => $request->kualitas
                    ,'created_at' => date("Y-m-d H:i:s")
                    ,'updated_at' => date("Y-m-d H:i:s")]
                );
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }else{
            try {
                DB::table('blueprint_tipe2')->insert(
                    ['uid_barang' => $uidBarang
                    ,'uid_kualitas' => $uidKualitas
                    ,'tipe' => $idKues
                    ,'barang' => $request->barang
                    ,'kualitas' => $request->kualitas
                    ,'created_at' => date("Y-m-d H:i:s")
                    ,'updated_at' => date("Y-m-d H:i:s")]
                );
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }
        if($berhasil){
            return json_encode($hasil);
        }else{
            return '0';
        }
    }
    public function addKualitas(Request $request, $idKues)
    {
        $berhasil = false;
        $uidKualitas = Uuid::generate()->string;
        $hasil = array();
        $hasil['uidKualitas'] = $uidKualitas;
        DB::beginTransaction();
        if($idKues != '5' && $idKues != '7'){
            try {
                DB::table('blueprint_tipe1')->insert(
                    ['uid_barang' => $request->uid_barang
                    ,'uid_kualitas' => $uidKualitas
                    ,'tipe' => $idKues
                    ,'barang' => $request->barang
                    ,'kualitas' => $request->kualitas
                    ,'created_at' => date("Y-m-d H:i:s")
                    ,'updated_at' => date("Y-m-d H:i:s")]
                );
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }else{
            try {
                DB::table('blueprint_tipe2')->insert(
                    ['uid_barang' => $request->uid_barang
                    ,'uid_kualitas' => $uidKualitas
                    ,'tipe' => $idKues
                    ,'barang' => $request->barang
                    ,'kualitas' => $request->kualitas
                    ,'created_at' => date("Y-m-d H:i:s")
                    ,'updated_at' => date("Y-m-d H:i:s")]
                );
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }
        if($berhasil){
            return json_encode($hasil);
        }else{
            return '0';
        }
    }
    public function deleteBarang (Request $request, $idKues){
        $berhasil = false;
        DB::beginTransaction();
        if($idKues != '5' && $idKues != '7'){
            try {
                DB::table('blueprint_tipe1')
                    ->where('uid_barang', '=', $request->uid_barang)
                    ->delete();
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }else{
            try {
                DB::table('blueprint_tipe2')
                    ->where('uid_barang', '=', $request->uid_barang)
                    ->delete();
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }
        if($berhasil){
            return '1';
        }else{
            return '0';
        }
    }
    public function deleteKualitas (Request $request, $idKues){
        $berhasil = false;
        DB::beginTransaction();
        if($idKues != '5' && $idKues != '7'){
            try {
                DB::table('blueprint_tipe1')
                    ->where([['uid_barang', '=', $request->uid_barang]
                        ,['uid_kualitas', '=', $request->uid_kualitas]])
                    ->delete();
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }else{
            try {
                DB::table('blueprint_tipe2')
                    ->where([['uid_barang', '=', $request->uid_barang]
                        ,['uid_kualitas', '=', $request->uid_kualitas]])
                    ->delete();
                $berhasil = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }
        if($berhasil){
            return '1';
        }else{
            return '0';
        }
    }
    public function action(Request $request, $idKues)
    {
        $berhasil = false;
        DB::beginTransaction();
        try {
            if($idKues != '5' && $idKues != '7'){
                if($request->idColumn == '1'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_standar' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_standar' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_standar' => ""]);
                    }
                }else if($request->idColumn == '2'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['merk' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['merk' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['merk' => ""]);
                    }
                }else if($request->idColumn == '3'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_setempat' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_setempat' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_setempat' => ""]);
                    }
                }else if($request->idColumn == '4'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_panjang' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_panjang' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_panjang' => ""]);
                    }
                }else if($request->idColumn == '5'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_lebar' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_lebar' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_lebar' => ""]);
                    }
                }else if($request->idColumn == '6'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_tinggi' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_tinggi' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_tinggi' => ""]);
                    }
                }else if($request->idColumn == '7'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_berat' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_berat' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['ukuran_berat' => ""]);
                    }
                }else if($request->idColumn == '8'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['konversi_setempat' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['konversi_setempat' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['konversi_setempat' => ""]);
                    }
                }else if($request->idColumn == '9'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['harga_satuan_setempat' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['harga_satuan_setempat' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['harga_satuan_setempat' => ""]);
                    }
                }else if($request->idColumn == '10'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['harga_satuan_standar' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['harga_satuan_standar' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['harga_satuan_standar' => ""]);
                    }
                }else if($request->idColumn == '11'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['keterangan' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['keterangan' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe1')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['keterangan' => ""]);
                    }
                }
            }else{
                if($request->idColumn == '1'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_unit' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_unit' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['satuan_unit' => ""]);
                    }
                }else if($request->idColumn == '2'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['nilai_sewa' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['nilai_sewa' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['nilai_sewa' => ""]);
                    }
                }else if($request->idColumn == '3'){
                    if($request->idAction == '1'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['keterangan' => '000-000']);
                    }else if($request->idAction == '2'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['keterangan' => $request->isi]);
                    }else if($request->idAction == '3'){
                        DB::table('blueprint_tipe2')
                            ->where([['uid_barang', '=', $request->uid_barang]
                                ,['uid_kualitas', '=', $request->uid_kualitas]])
                            ->update(['keterangan' => ""]);
                    }
                }
            }
            $berhasil = true;
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        if($berhasil){
            return '1';
        }else{
            return '0';
        }
    }
}
