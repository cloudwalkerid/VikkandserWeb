<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;
use Exception;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        if(Auth::user()->tipePengguna == 0){
            Auth::logout();
            return redirect()->action('Auth\LoginController@showLoginForm');
        }
        $surveis = DB::table('survei')->count();
        if ($surveis == 0) {
            $data = array();
            $data['urlbase'] = Config::get('app.url');
            return redirect()->action('HomeController@newSurveiGet');
        }
        $listSurvei = DB::table('survei')->get();
        $listUser = DB::table('users')
            ->select('nip', 'nama', 'tipePengguna')
            ->get();
        if ($request->session()->has('uid_survei')) {
            $item = DB::table('survei')
                ->where('uid', $request->session()->get('uid_survei'))
                ->first();
            $data = array();
            $data['indexurl'] = 1;
            $data['indexkues'] = 0;
            $data['title'] = 'Dashboard';
            $data['selectedSurvei'] = $item;
            $data['listSurvei'] = $listSurvei;
            $data['listUser'] = $listUser;
            $data['urlbase'] = Config::get('app.url');
            return view('home', $data);
        } else {
            $item = DB::table('survei')
                ->orderBy('uid', 'desc')
                ->first();
            $request->session()->put('uid_survei', $item->uid);
            $data = array();
            $data['indexurl'] = 1;
            $data['indexkues'] = 0;
            $data['title'] = 'Dashboard';
            $data['selectedSurvei'] = $item;
            $data['listSurvei'] = $listSurvei;
            $data['listUser'] = $listUser;
            $data['urlbase'] = Config::get('app.url');
            return view('home', $data);
        }

    }

    public function newSurveiGet(Request $request)
    {
        $data = array();
        $data['urlbase'] = Config::get('app.url');
        return view('kosong', $data);
    }

    public function newSurveiPost(Request $request)
    {
        try {
            $mulaiPices = explode("/", $request->mulai);
            $akhirPices = explode("/", $request->akhir);
            $uidBaru = Uuid::generate()->string;
            DB::table('survei')->insert(
                ['uid' => $uidBaru
                    , 'bulan' => $request->bulan
                    , 'tahun' => $request->tahun
                    , 'mulai' => $mulaiPices[2] . ':' . $mulaiPices['1'] . ':' . $mulaiPices[0]
                    , 'akhir' => $akhirPices[2] . ':' . $akhirPices['1'] . ':' . $akhirPices[0]
                    , 'created_at' => date("Y-m-d H:i:s")
                    , 'updated_at' => date("Y-m-d H:i:s")]
            );
            $listUser = DB::table('users')
                ->get();
            // $listResponden = DB::table('blueprint_responden')
            //     ->get();
            foreach ($listUser as $item) {
                DB::table('petugas')->insert(
                    ['nip' => $item->nip
                        , 'uid_survei' => $uidBaru
                        , 'created_at' => date("Y-m-d H:i:s")
                        , 'updated_at' => date("Y-m-d H:i:s")]
                );
            }
            // foreach ($listResponden as $item) {
            //     DB::table('responden')->insert(
            //         ['username' => $item->username
            //             , 'uid_survei' => $request->tahun . '_' . $request->bulan
            //             , 'created_at' => date("Y-m-d H:i:s")
            //             , 'updated_at' => date("Y-m-d H:i:s")]
            //     );
            // }
            $request->session()->put('uid_survei', $uidBaru);
            // all good
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        return redirect()->action('HomeController@index');
    }
    public function selectSurvei(Request $request, $uid_survei)
    {
        $request->session()->put('uid_survei', $uid_survei);
        return redirect()->action('HomeController@index');
    }
    public function editSurvei(Request $request)
    {
        $mulaiPices = explode("/", $request->mulai);
        $akhirPices = explode("/", $request->akhir);
        $success = DB::table('survei')
            ->where('uid', $request->session()->get('uid_survei'))
            ->update(
                ['nippetugas' => $request->nippetugas
                    , 'nippemeriksa' => $request->nippemeriksa
                    , 'mulai' => $mulaiPices[2] . '-' . $mulaiPices['1'] . '-' . $mulaiPices[0]
                    , 'akhir' => $akhirPices[2] . '-' . $akhirPices['1'] . '-' . $akhirPices[0]
                    , 'updated_at' => date("Y-m-d H:i:s")]
            );
        if ($success) {
            return '1';
        } else {
            return '0';
        }
    }
    public function startSurvei(Request $request)
    {
        $berhasil = false;
        try {
            DB::table('survei')
                ->where('uid', $request->session()->get('uid_survei'))
                ->update(
                    ['isStart' => '1']
                );
            $listUser = DB::table('responden')
                ->where('uid_survei', $request->session()->get('uid_survei'))
                ->get();
            $listBlueprint1 = DB::table('blueprint_tipe1')
                ->where('tipe', '1')
                ->get();
            $listBlueprint2 = DB::table('blueprint_tipe1')
                ->where('tipe', '2')
                ->get();
            $listBlueprint3 = DB::table('blueprint_tipe1')
                ->where('tipe', '3')
                ->get();
            $listBlueprint4 = DB::table('blueprint_tipe1')
                ->where('tipe', '4')
                ->get();
            $listBlueprint5 = DB::table('blueprint_tipe2')
                ->where('tipe', '5')
                ->get();
            $listBlueprint6 = DB::table('blueprint_tipe1')
                ->where('tipe', '6')
                ->get();
            $listBlueprint7 = DB::table('blueprint_tipe2')
                ->where('tipe', '7')
                ->get();

            foreach ($listUser as $item) {
                if ($item->tipeResponden == '1') {
                    foreach ($listBlueprint1 as $itemBlue) {
                        DB::table('responden_tipe1')->insert(
                            ['uid_survei' => $request->session()->get('uid_survei')
                                , 'id_responden' => $item->id
                                , 'uid_barang' => $itemBlue->uid_barang
                                , 'uid_kualitas' => $itemBlue->uid_kualitas
                                , 'tipe' => $itemBlue->tipe
                                , 'barang' => $itemBlue->barang
                                , 'kualitas' => $itemBlue->kualitas
                                , 'satuan_standar' => $itemBlue->satuan_standar
                                , 'merk' => $itemBlue->merk
                                , 'satuan_setempat' => $itemBlue->satuan_setempat
                                , 'ukuran_panjang' => $itemBlue->ukuran_panjang
                                , 'ukuran_lebar' => $itemBlue->ukuran_lebar
                                , 'ukuran_tinggi' => $itemBlue->ukuran_tinggi
                                , 'ukuran_berat' => $itemBlue->ukuran_berat
                                , 'konversi_setempat' => $itemBlue->konversi_setempat
                                , 'harga_satuan_setempat' => $itemBlue->harga_satuan_setempat
                                , 'harga_satuan_standar' => $itemBlue->harga_satuan_standar
                                , 'keterangan' => $itemBlue->keterangan
                                , 'created_at' => date("Y-m-d H:i:s")
                                , 'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                } else if ($item->tipeResponden == '2') {
                    foreach ($listBlueprint2 as $itemBlue) {
                        DB::table('responden_tipe1')->insert(
                            ['uid_survei' => $request->session()->get('uid_survei')
                                , 'id_responden' => $item->id
                                , 'uid_barang' => $itemBlue->uid_barang
                                , 'uid_kualitas' => $itemBlue->uid_kualitas
                                , 'tipe' => $itemBlue->tipe
                                , 'barang' => $itemBlue->barang
                                , 'kualitas' => $itemBlue->kualitas
                                , 'satuan_standar' => $itemBlue->satuan_standar
                                , 'merk' => $itemBlue->merk
                                , 'satuan_setempat' => $itemBlue->satuan_setempat
                                , 'ukuran_panjang' => $itemBlue->ukuran_panjang
                                , 'ukuran_lebar' => $itemBlue->ukuran_lebar
                                , 'ukuran_tinggi' => $itemBlue->ukuran_tinggi
                                , 'ukuran_berat' => $itemBlue->ukuran_berat
                                , 'konversi_setempat' => $itemBlue->konversi_setempat
                                , 'harga_satuan_setempat' => $itemBlue->harga_satuan_setempat
                                , 'harga_satuan_standar' => $itemBlue->harga_satuan_standar
                                , 'keterangan' => $itemBlue->keterangan
                                , 'created_at' => date("Y-m-d H:i:s")
                                , 'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                } else if ($item->tipeResponden == '3') {
                    foreach ($listBlueprint3 as $itemBlue) {
                        DB::table('responden_tipe1')->insert(
                            ['uid_survei' => $request->session()->get('uid_survei')
                                , 'id_responden' => $item->id
                                , 'uid_barang' => $itemBlue->uid_barang
                                , 'uid_kualitas' => $itemBlue->uid_kualitas
                                , 'tipe' => $itemBlue->tipe
                                , 'barang' => $itemBlue->barang
                                , 'kualitas' => $itemBlue->kualitas
                                , 'satuan_standar' => $itemBlue->satuan_standar
                                , 'merk' => $itemBlue->merk
                                , 'satuan_setempat' => $itemBlue->satuan_setempat
                                , 'ukuran_panjang' => $itemBlue->ukuran_panjang
                                , 'ukuran_lebar' => $itemBlue->ukuran_lebar
                                , 'ukuran_tinggi' => $itemBlue->ukuran_tinggi
                                , 'ukuran_berat' => $itemBlue->ukuran_berat
                                , 'konversi_setempat' => $itemBlue->konversi_setempat
                                , 'harga_satuan_setempat' => $itemBlue->harga_satuan_setempat
                                , 'harga_satuan_standar' => $itemBlue->harga_satuan_standar
                                , 'keterangan' => $itemBlue->keterangan
                                , 'created_at' => date("Y-m-d H:i:s")
                                , 'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                } else if ($item->tipeResponden == '4') {
                    foreach ($listBlueprint4 as $itemBlue) {
                        DB::table('responden_tipe1')->insert(
                            ['uid_survei' => $request->session()->get('uid_survei')
                                , 'id_responden' => $item->id
                                , 'uid_barang' => $itemBlue->uid_barang
                                , 'uid_kualitas' => $itemBlue->uid_kualitas
                                , 'tipe' => $itemBlue->tipe
                                , 'barang' => $itemBlue->barang
                                , 'kualitas' => $itemBlue->kualitas
                                , 'satuan_standar' => $itemBlue->satuan_standar
                                , 'merk' => $itemBlue->merk
                                , 'satuan_setempat' => $itemBlue->satuan_setempat
                                , 'ukuran_panjang' => $itemBlue->ukuran_panjang
                                , 'ukuran_lebar' => $itemBlue->ukuran_lebar
                                , 'ukuran_tinggi' => $itemBlue->ukuran_tinggi
                                , 'ukuran_berat' => $itemBlue->ukuran_berat
                                , 'konversi_setempat' => $itemBlue->konversi_setempat
                                , 'harga_satuan_setempat' => $itemBlue->harga_satuan_setempat
                                , 'harga_satuan_standar' => $itemBlue->harga_satuan_standar
                                , 'keterangan' => $itemBlue->keterangan
                                , 'created_at' => date("Y-m-d H:i:s")
                                , 'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                } else if ($item->tipeResponden == '5') {
                    foreach ($listBlueprint5 as $itemBlue) {
                        DB::table('responden_tipe2')->insert(
                            ['uid_survei' => $request->session()->get('uid_survei')
                                , 'id_responden' => $item->id
                                , 'uid_barang' => $itemBlue->uid_barang
                                , 'uid_kualitas' => $itemBlue->uid_kualitas
                                , 'tipe' => $itemBlue->tipe
                                , 'barang' => $itemBlue->barang
                                , 'kualitas' => $itemBlue->kualitas
                                , 'satuan_unit' => $itemBlue->satuan_unit
                                , 'nilai_sewa' => $itemBlue->nilai_sewa
                                , 'keterangan' => $itemBlue->keterangan
                                , 'created_at' => date("Y-m-d H:i:s")
                                , 'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                } else if ($item->tipeResponden == '6') {
                    foreach ($listBlueprint6 as $itemBlue) {
                        DB::table('responden_tipe1')->insert(
                            ['uid_survei' => $request->session()->get('uid_survei')
                                , 'id_responden' => $item->id
                                , 'uid_barang' => $itemBlue->uid_barang
                                , 'uid_kualitas' => $itemBlue->uid_kualitas
                                , 'tipe' => $itemBlue->tipe
                                , 'barang' => $itemBlue->barang
                                , 'kualitas' => $itemBlue->kualitas
                                , 'satuan_standar' => $itemBlue->satuan_standar
                                , 'merk' => $itemBlue->merk
                                , 'satuan_setempat' => $itemBlue->satuan_setempat
                                , 'ukuran_panjang' => $itemBlue->ukuran_panjang
                                , 'ukuran_lebar' => $itemBlue->ukuran_lebar
                                , 'ukuran_tinggi' => $itemBlue->ukuran_tinggi
                                , 'ukuran_berat' => $itemBlue->ukuran_berat
                                , 'konversi_setempat' => $itemBlue->konversi_setempat
                                , 'harga_satuan_setempat' => $itemBlue->harga_satuan_setempat
                                , 'harga_satuan_standar' => $itemBlue->harga_satuan_standar
                                , 'keterangan' => $itemBlue->keterangan
                                , 'created_at' => date("Y-m-d H:i:s")
                                , 'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                } else if ($item->tipeResponden == '7') {
                    foreach ($listBlueprint7 as $itemBlue) {
                        DB::table('responden_tipe2')->insert(
                            ['uid_survei' => $request->session()->get('uid_survei')
                                , 'id_responden' => $item->id
                                , 'uid_barang' => $itemBlue->uid_barang
                                , 'uid_kualitas' => $itemBlue->uid_kualitas
                                , 'tipe' => $itemBlue->tipe
                                , 'barang' => $itemBlue->barang
                                , 'kualitas' => $itemBlue->kualitas
                                , 'satuan_unit' => $itemBlue->satuan_unit
                                , 'nilai_sewa' => $itemBlue->nilai_sewa
                                , 'keterangan' => $itemBlue->keterangan
                                , 'created_at' => date("Y-m-d H:i:s")
                                , 'updated_at' => date("Y-m-d H:i:s")]
                        );
                    }
                }
            }
            $berhasil = true;
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        return redirect()->action('HomeController@index');
    }
    public function hapusSurvei(Request $request)
    {
        $berhasil = false;
        try{
            DB::table('survei')->where('uid', '='
                , $request->session()->get('uid_survei'))->delete();
            DB::table('responden')->where('uid_survei', '='
                , $request->session()->get('uid_survei'))->delete();
            DB::table('petugas')->where('uid_survei', '='
                , $request->session()->get('uid_survei'))->delete();
            DB::table('responden_tipe1')->where('uid_survei', '='
                , $request->session()->get('uid_survei'))->delete();
            DB::table('responden_tipe2')->where('uid_survei', '='
                , $request->session()->get('uid_survei'))->delete();
            $berhasil = true;
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        return redirect()->action('HomeController@index');
    }

    public function kembaliSurvei(Request $request)
    {
        $berhasil = false;
        try{
            $thisSurvei = DB::table('survei')
                ->where('uid', '=', $request->session()->get('uid_survei'))
                ->first();
            $uidBaru = Uuid::generate()->string;
            DB::table('survei')->insert(
                    ['uid' => $uidBaru
                        , 'bulan' => $thisSurvei->bulan
                        , 'tahun' => $thisSurvei->tahun
                        , 'mulai' => $thisSurvei->mulai
                        , 'akhir' => $thisSurvei->akhir
                        , 'created_at' => $thisSurvei->created_at
                        , 'updated_at' => date("Y-m-d H:i:s")]
                );
            DB::table('survei')
                ->where('uid', '=', $request->session()->get('uid_survei'))
                ->delete();
            DB::table('responden_tipe1')->where('uid_survei', '='
                , $request->session()->get('uid_survei'))->delete();
            DB::table('responden_tipe2')->where('uid_survei', '='
                , $request->session()->get('uid_survei'))->delete();
            $request->session()->put('uid_survei', $uidBaru);
            $berhasil = true;
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        return redirect()->action('HomeController@index');
    }
}
