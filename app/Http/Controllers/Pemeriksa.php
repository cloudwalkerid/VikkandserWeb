<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Pemeriksa extends Controller
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
        $listRespondenTipe1 = DB::table('responden_tipe1')
            ->where('uid_survei', $request->session()->get('uid_survei'))
            ->get();
        $listRespondenTipe2 = DB::table('responden_tipe2')
            ->where('uid_survei', $request->session()->get('uid_survei'))
            ->get();
        $listPetugas = DB::table('petugas')
            ->join('users', 'users.nip', '=', 'petugas.nip')
            ->select('petugas.*', 'users.nip', 'users.nama', 'users.tipePengguna', 'users.jabatan', 'users.photo')
            ->where('uid_survei', $request->session()->get('uid_survei'))
            ->get();
        $listResponden = DB::table('responden')
            ->join('blueprint_responden', 'blueprint_responden.username', '=', 'responden.username')
            ->select('responden.*', 'blueprint_responden.nama', 'blueprint_responden.photo')
            ->where('uid_survei', $request->session()->get('uid_survei'))
            ->get();
        if ($request->session()->has('uid_survei')) {
            $item = DB::table('survei')
                ->where('uid', $request->session()->get('uid_survei'))
                ->first();
            $data = array();
            $data ['indexurl'] = 6;
            $data ['indexkues'] = 0;
            $data ['title'] = 'Pemeriksaan';
            $data['selectedSurvei'] = $item;
            $data['listSurvei'] = $listSurvei;
            $data['listRespondenTipe1'] = $listRespondenTipe1;
            $data['listRespondenTipe2'] = $listRespondenTipe2;
            $data['listPetugas'] = $listPetugas;
            $data['listResponden'] = $listResponden;
            $data['urlbase'] = Config::get('app.url');
            return view('pemeriksaan', $data);
        } else {
            $item = DB::table('survei')
                ->orderBy('uid', 'desc')
                ->first();
            $request->session()->put('uid_survei', $item->uid);
            $data = array();
            $data ['indexurl'] = 6;
            $data ['indexkues'] = 0;
            $data ['title'] = 'Pemeriksaan';
            $data['selectedSurvei'] = $item;
            $data['listSurvei'] = $listSurvei;
            $data['listRespondenTipe1'] = $listRespondenTipe1;
            $data['listRespondenTipe2'] = $listRespondenTipe2;
            $data['listPetugas'] = $listPetugas;
            $data['listResponden'] = $listResponden;
            $data['urlbase'] = Config::get('app.url');
            return view('pemeriksaan', $data);
        }
    }
}
