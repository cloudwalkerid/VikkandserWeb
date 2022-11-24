<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Webpatser\Uuid\Uuid;

class Responden extends Controller
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
            $listResponden = DB::table('responden')
                ->join('blueprint_responden', 'blueprint_responden.username', '=', 'responden.username')
                ->select('responden.*', 'blueprint_responden.nama', 'blueprint_responden.photo')
                ->where('uid_survei', $request->session()->get('uid_survei'))
                ->get();
            $data = array();
            $data ['indexurl'] = 3;
            $data ['indexkues'] = 0;
            $data ['title'] = 'Responden';
            $data ['selectedSurvei'] = $item;
            $data ['listSurvei'] = $listSurvei;
            $data ['listResponden'] = $listResponden;
            $data ['urlbase'] = Config::get('app.url');
            return view('responden', $data);
        }else{
            $item = DB::table('survei')
                    ->orderBy('uid', 'desc')
                    ->first();
            $request->session()->put('uid_survei', $item->uid);
            $listResponden = DB::table('responden')
                ->join('blueprint_responden', 'blueprint_responden.username', '=', 'responden.username')
                ->select('responden.*', 'blueprint_responden.nama', 'blueprint_responden.photo')
                ->where('uid_survei', $request->session()->get('uid_survei'))
                ->get();
            $data = array();
            $data ['indexurl'] = 3;
            $data ['indexkues'] = 0;
            $data ['title'] = 'Responden';
            $data ['selectedSurvei'] = $item;
            $data ['listSurvei'] = $listSurvei;
            $data ['listResponden'] = $listResponden;
            $data ['urlbase'] = Config::get('app.url');
            return view('responden', $data);
        }
    }
    public function getResponden(Request $request)
    {
        $listUser = DB::table('blueprint_responden')
            ->select('username', 'nama', 'photo')
            ->get();
        return json_encode($listUser);
    }

    public function getPetugas(Request $request)
    {
        $listUser = DB::table('users')
            ->join('petugas', 'petugas.nip', '=', 'users.nip')
            ->where('uid_survei',$request->session()->get('uid_survei'))
            ->select('users.nip', 'nama', 'tipePengguna', 'jabatan')
            ->get();
        return json_encode($listUser);
    }
    public function addResponden(Request $request){
        $berhasil = false;
        DB::beginTransaction();
        try {
            if($request->addAction == '1'){
                DB::table('blueprint_responden')->insert(
                    ['username' => $request->username
                    ,'password' => bcrypt($request->password)
                    ,'nama' => $request->nama
                    ,'photo' => $request->photo
                    ,'created_at' => date("Y-m-d H:i:s")
                    ,'updated_at' => date("Y-m-d H:i:s")]
                );
                DB::table('responden')->insert(
                    ['username' => $request->username
                    ,'uid_survei' => $request->session()->get('uid_survei')
                    ,'tipeResponden' => $request->tipeResponden
                    ,'isSelfEnum' => $request->isSelfEnum
                    ,'nipPetugas' => $request->nipPetugas
                    ,'created_at' => date("Y-m-d H:i:s")
                    ,'updated_at' => date("Y-m-d H:i:s")]
                );
            }else if($request->addAction == '2'){
                DB::table('responden')->insert(
                    ['username' => $request->username
                    ,'uid_survei' => $request->session()->get('uid_survei')
                    ,'tipeResponden' => $request->tipeResponden
                    ,'isSelfEnum' => $request->isSelfEnum
                    ,'nipPetugas' => $request->nipPetugas
                    ,'created_at' => date("Y-m-d H:i:s")
                    ,'updated_at' => date("Y-m-d H:i:s")]
                );
            }
            $berhasil = true;
            // all good
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        if($berhasil){
            return '1';
        }else{
            return '0';
        }
    }

    public function deleteResponden(Request $request){
        $berhasil = false;
        DB::beginTransaction();
        try {
            if($request->deleteAction == '1'){
                DB::table('responden')
                    ->where([['username',  $request->username]
                        ,['uid_survei', $request->session()->get('uid_survei')]
                        ,['tipeResponden', $request->tipeResponden]])
                    ->delete();
            }else if($request->deleteAction == '2'){
                DB::table('blueprint_responden')
                    ->where('username',  $request->username)
                    ->delete();
                DB::table('responden')
                    ->where([['username',  $request->username]
                        ,['uid_survei', $request->session()->get('uid_survei')]])
                    ->delete();
            }
            $berhasil = true;
            // all good
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }

        if($berhasil){
            return '1';
        }else{
            return '0';
        }
    }

    public function ubahResponden(Request $request){
        $berhasil = false;
        DB::beginTransaction();
        try {
            if($request->ubahAction == '1'){
                //ubah password
                DB::table('blueprint_responden')
                    ->where('username',  $request->username)
                    ->update(
                        ['password' => bcrypt($request->password)
                        ,'nama' => $request->nama
                        ,'photo' => $request->photo
                        ,'updated_at' => date("Y-m-d H:i:s")]
                        );
                DB::table('responden')
                    ->where([['username',  $request->username]
                        ,['uid_survei', $request->session()->get('uid_survei')]
                        ,['tipeResponden', $request->tipeResponden]])
                    ->update(
                        ['isSelfEnum' => $request->isSelfEnum
                        ,'nipPetugas' => $request->nipPetugas
                        ,'updated_at' => date("Y-m-d H:i:s")]
                        );
            }else if($request->ubahAction == '2'){
                //ubah tanpa passaword
                DB::table('blueprint_responden')
                    ->where('username',  $request->username)
                    ->update(
                        ['nama' => $request->nama
                        ,'photo' => $request->photo
                        ,'updated_at' => date("Y-m-d H:i:s")]
                        );
                DB::table('responden')
                    ->where([['username',  $request->username]
                        ,['uid_survei', $request->session()->get('uid_survei')]
                        ,['tipeResponden', $request->tipeResponden]])
                    ->update(
                        ['isSelfEnum' => $request->isSelfEnum
                        ,'nipPetugas' => $request->nipPetugas
                        ,'updated_at' => date("Y-m-d H:i:s")]
                        );
            }
            $berhasil = true;
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        if($berhasil){
            return '1';
        }else{
            return '0';
        }
    }
    public function uploadPhoto(Request $request)
    {
        if ($request->file('photo')->isValid()) {
            $uploadedFile = $request->file('photo');
            $uuid = Uuid::generate()->string . '.' . $uploadedFile->getClientOriginalExtension();
            //$path = $uploadedFile->storeAs('public/img/responden', $uuid);
            $path = $uploadedFile->move(public_path()."/img/responden", $uuid);
            return $uuid;
        } else {
            return '0';
        }
    }
}
