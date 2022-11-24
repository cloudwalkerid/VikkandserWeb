<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class Petugas extends Controller
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
            return view('kosong', $data);
        }
        $listSurvei = DB::table('survei')->get();
        if ($request->session()->has('uid_survei')) {
            $item = DB::table('survei')
                ->where('uid', $request->session()->get('uid_survei'))
                ->first();
            $listPetugas = DB::table('petugas')
                ->join('users', 'users.nip', '=', 'petugas.nip')
                ->select('petugas.*', 'users.nip', 'users.nama', 'users.tipePengguna', 'users.jabatan', 'users.photo')
                ->where('uid_survei', $request->session()->get('uid_survei'))
                ->get();
            $data = array();
            $data['indexurl'] = 4;
            $data['indexkues'] = 0;
            $data['title'] = 'Petugas';
            $data['selectedSurvei'] = $item;
            $data['listSurvei'] = $listSurvei;
            $data['listPetugas'] = $listPetugas;
            $data['urlbase'] = Config::get('app.url');
            return view('petugas', $data);
        } else {
            $item = DB::table('survei')
                ->orderBy('uid', 'desc')
                ->first();
            $request->session()->put('uid_survei', $item->uid);
            $listPetugas = DB::table('petugas')
                ->join('users', 'users.nip', '=', 'petugas.nip')
                ->select('petugas.*', 'users.nama', 'users.tipePengguna', 'users.jabatan', 'users.photo')
                ->where('uid_survei', $request->session()->get('uid_survei'))
                ->get();
            $data = array();
            $data['indexurl'] = 4;
            $data['indexkues'] = 0;
            $data['title'] = 'Petugas';
            $data['selectedSurvei'] = $item;
            $data['listSurvei'] = $listSurvei;
            $data['listPetugas'] = $listPetugas;
            $data['urlbase'] = Config::get('app.url');
            return view('petugas', $data);
        }
    }

    public function getPetugas(Request $request)
    {
        $listUser = DB::table('users')
            ->select('nip', 'nama', 'tipePengguna', 'jabatan')
            ->get();
        return json_encode($listUser);
    }

    public function addPetugas(Request $request)
    {
        $berhasil = false;
        DB::beginTransaction();
        if ($request->addAction == '1') {
            try {
                DB::table('users')->insert(
                    ['nip' => $request->nip
                        , 'password' => bcrypt($request->password)
                        , 'nama' => $request->nama
                        , 'tipePengguna' => $request->tipePengguna
                        , 'jabatan' => $request->jabatan
                        , 'photo' => $request->photo
                        , 'created_at' => date("Y-m-d H:i:s")
                        , 'updated_at' => date("Y-m-d H:i:s")]
                );
                DB::table('petugas')->insert(
                    ['nip' => $request->nip
                        , 'uid_survei' => $request->session()->get('uid_survei')
                        , 'created_at' => date("Y-m-d H:i:s")
                        , 'updated_at' => date("Y-m-d H:i:s")]
                );
                $berhasil = true;
                // all good
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                // something went wrong
            }
        } else if ($request->addAction == '2') {
            try {
                DB::table('petugas')->insert(
                    ['nip' => $request->nip
                        , 'uid_survei' => $request->session()->get('uid_survei')
                        , 'created_at' => date("Y-m-d H:i:s")
                        , 'updated_at' => date("Y-m-d H:i:s")]
                );
                $berhasil = true;
                // all good
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                // something went wrong
            }
        }
        if ($berhasil) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deletePetugas(Request $request)
    {
        $berhasil = false;
        DB::beginTransaction();
        try {

            if ($request->deleteAction == '1') {
                DB::table('petugas')
                    ->where([['nip', $request->nip]
                        ,['uid_survei', $request->session()->get('uid_survei')]])
                    ->delete();
            } else if ($request->deleteAction == '2') {
                DB::table('petugas')
                    ->where([['nip', $request->nip]
                        ,['uid_survei', $request->session()->get('uid_survei')]])
                    ->delete();
                DB::table('users')
                    ->where('nip', $request->nip)
                    ->delete();
            }
            $berhasil = true;

            // all good
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        if ($berhasil) {
            return '1';
        } else {
            return '0';
        }
    }

    public function ubahPetugas(Request $request)
    {
        $berhasil = false;
        DB::beginTransaction();
        try {

            if ($request->ubahAction == '1') {
                //ubah password
                DB::table('users')
                    ->where('nip', $request->nip)
                    ->update(['password' => bcrypt($request->password)
                        , 'nama' => $request->nama
                        , 'tipePengguna' => $request->tipePengguna
                        , 'jabatan' => $request->jabatan
                        , 'photo' => $request->photo
                        , 'created_at' => date("Y-m-d H:i:s")
                        , 'updated_at' => date("Y-m-d H:i:s")]);
            } else if ($request->ubahAction == '2') {
                //ubah tanpa passaword
                DB::table('users')
                    ->where('nip', $request->nip)
                    ->update(['nama' => $request->nama
                        , 'tipePengguna' => $request->tipePengguna
                        , 'jabatan' => $request->jabatan
                        , 'photo' => $request->photo
                        , 'created_at' => date("Y-m-d H:i:s")
                        , 'updated_at' => date("Y-m-d H:i:s")]);
            }
            $berhasil = true;

            // all good
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            // something went wrong
        }
        if ($berhasil) {
            return '1';
        } else {
            return '0';
        }
    }
    public function uploadPhoto(Request $request)
    {
        if ($request->file('photo')->isValid()) {
            $uploadedFile = $request->file('photo');
            $uuid = Uuid::generate()->string . '.' . $uploadedFile->getClientOriginalExtension();
            // $path = $uploadedFile->storeAs('public/img/user', $uuid);
            $path = $uploadedFile->move(public_path()."/img/user", $uuid);
            return $uuid;
        } else {
            return '0';
        }
    }
}
