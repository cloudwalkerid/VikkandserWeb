<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RespondenApi extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['username', 'password']);

        if (!$token = Auth::guard('apiResponden')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::guard('apiResponden')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('apiResponden')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('apiResponden')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('apiResponden')->factory()->getTTL() * 60,
        ]);
    }

    public function listSurvei(Request $request)
    {
        if (!Auth::guard('apiResponden')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
        }
        $listResponden = DB::table('responden')
            ->join('survei', 'responden.uid_survei', '=', 'survei.uid')
            ->where([['username', Auth::guard('apiResponden')->user()->username]
                , ['isSelfEnum', '1'], ['isStart', '1']])
            ->get();
        $listSurvei = [];
        foreach ($listResponden as $item) {
            $sudahAda = false;
            foreach ($listSurvei as $itemDone) {
                if ($item->uid == $itemDone->uid) {
                    $sudahAda = true;
                    break;
                }
            }
            if (!$sudahAda) {
                array_push($listSurvei, $item);
            }
        }
        return json_encode($listSurvei);
    }
    public function downloadSurvei(Request $request)
    {
        if (!Auth::guard('apiResponden')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
        }
        $respos= DB::table('responden')
            ->join('blueprint_responden', 'responden.username', '=', 'blueprint_responden.username')
            ->select('responden.*', 'nama', 'photo')
            ->where([['responden.username', Auth::guard('apiResponden')->user()->username]
                , ['uid_survei', $request->uid_survei]
                , ['isSelfEnum', '1']])
            ->get();
        //return count($respos);
        if (count($respos) > 0) {
            $hasil = array();
            foreach ($respos as $respo) {
                if ($respo->tipeResponden != '7' && $respo->tipeResponden != '5') {
                    $survei = DB::table('responden_tipe1')
                        ->where([['id_responden', $respo->id]
                            , ['uid_survei', $request->uid_survei]])
                        ->get();
                    $respo->items = $survei;
                    array_push($hasil, $respo);
                } else {
                    $survei = DB::table('responden_tipe2')
                        ->where([['id_responden', $respo->id]
                            , ['uid_survei', $request->uid_survei]])
                        ->get();
                    $respo->items = $survei;
                    array_push($hasil, $respo);
                }
            }
            return json_encode($hasil);
        } else {
            return response()->json(['error' => 'no-record']);
        }
    }
    public function refreshSurvei(Request $request)
    {
        if (!Auth::guard('apiResponden')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
        }
        $berhasil = false;
        DB::beginTransaction();
        try {
            $survei = json_decode($request->survei, true);
            foreach ($survei as $itemBlue) {
                if ($itemBlue['tipe'] != 7 && $itemBlue['tipe'] != 5) {
                    DB::table('responden_tipe1')
                        ->join('responden', 'responden.id', '=', 'responden_tipe1.id_responden')
                        ->where([['username', Auth::guard('apiResponden')->user()->username]
                            , ['id_responden', $itemBlue['id_responden']]
                            , ['responden_tipe1.uid_survei', $itemBlue['uid_survei']]
                            , ['uid_barang', $itemBlue['uid_barang']]
                            , ['uid_kualitas', $itemBlue['uid_kualitas']]])
                        ->update(
                            ['satuan_standar' => $itemBlue['satuan_standar']
                                , 'merk' => $itemBlue['merk']
                                , 'satuan_setempat' => $itemBlue['satuan_setempat']
                                , 'ukuran_panjang' => $itemBlue['ukuran_panjang']
                                , 'ukuran_lebar' => $itemBlue['ukuran_lebar']
                                , 'ukuran_tinggi' => $itemBlue['ukuran_tinggi']
                                , 'ukuran_berat' => $itemBlue['ukuran_berat']
                                , 'konversi_setempat' => $itemBlue['konversi_setempat']
                                , 'harga_satuan_setempat' => $itemBlue['harga_satuan_setempat']
                                , 'harga_satuan_standar' => $itemBlue['harga_satuan_standar']
                                , 'keterangan' => $itemBlue['keterangan']
                                , 'responden_tipe1.status' => '3'
                                , 'responden_tipe1.updated_at' => date("Y-m-d H:i:s")]
                        );
                } else {
                    DB::table('responden_tipe2')
                        ->join('responden', 'responden.id', '=', 'responden_tipe2.id_responden')
                        ->where([['username', Auth::guard('apiResponden')->user()->username]
                            , ['id_responden', $itemBlue['id_responden']]
                            , ['responden_tipe2.uid_survei', $itemBlue['uid_survei']]
                            , ['uid_barang', $itemBlue['uid_barang']]
                            , ['uid_kualitas', $itemBlue['uid_kualitas']]])
                        ->update(
                            ['satuan_unit' => $itemBlue['satuan_unit']
                                , 'nilai_sewa' => $itemBlue['nilai_sewa']
                                , 'keterangan' => $itemBlue['keterangan']
                                , 'responden_tipe2.status' => '3'
                                , 'responden_tipe2.updated_at' => date("Y-m-d H:i:s")]
                        );
                }
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
    public function submitSurvei(Request $request)
    {
        if (!Auth::guard('apiResponden')->check()) {
            return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
        }
        $berhasil = false;
        DB::beginTransaction();
        try {
            $survei = json_decode($request->survei, true);

            foreach ($survei as $itemBlue) {
                if ($itemBlue['tipe'] != 7 && $itemBlue['tipe'] != 5) {
                    DB::table('responden_tipe1')
                        ->join('responden', 'responden.id', '=', 'responden_tipe1.id_responden')
                        ->where([['username', Auth::guard('apiResponden')->user()->username]
                            , ['isSelfEnum', '1']
                            , ['id_responden', $itemBlue['id_responden']]
                            , ['responden_tipe1.uid_survei', $itemBlue['uid_survei']]
                            , ['uid_barang', $itemBlue['uid_barang']]
                            , ['uid_kualitas', $itemBlue['uid_kualitas']]])
                        ->update(
                            ['satuan_standar' => $itemBlue['satuan_standar']
                                , 'merk' => $itemBlue['merk']
                                , 'satuan_setempat' => $itemBlue['satuan_setempat']
                                , 'ukuran_panjang' => $itemBlue['ukuran_panjang']
                                , 'ukuran_lebar' => $itemBlue['ukuran_lebar']
                                , 'ukuran_tinggi' => $itemBlue['ukuran_tinggi']
                                , 'ukuran_berat' => $itemBlue['ukuran_berat']
                                , 'konversi_setempat' => $itemBlue['konversi_setempat']
                                , 'harga_satuan_setempat' => $itemBlue['harga_satuan_setempat']
                                , 'harga_satuan_standar' => $itemBlue['harga_satuan_standar']
                                , 'keterangan' => $itemBlue['keterangan']
                                , 'responden_tipe1.status' => '4'
                                , 'responden_tipe1.updated_at' => date("Y-m-d H:i:s")]
                        );
                } else {
                    DB::table('responden_tipe2')
                        ->join('responden', 'responden.id', '=', 'responden_tipe2.id_responden')
                        ->where([['username', Auth::guard('apiResponden')->user()->username]
                            , ['isSelfEnum', '1']
                            , ['id_responden', $itemBlue['id_responden']]
                            , ['responden_tipe2.uid_survei', $itemBlue['uid_survei']]
                            , ['uid_barang', $itemBlue['uid_barang']]
                            , ['uid_kualitas', $itemBlue['uid_kualitas']]])
                        ->update(
                            ['satuan_unit' => $itemBlue['satuan_unit']
                                , 'nilai_sewa' => $itemBlue['nilai_sewa']
                                , 'keterangan' => $itemBlue['keterangan']
                                , 'responden_tipe2.status' => '4'
                                , 'responden_tipe2.updated_at' => date("Y-m-d H:i:s")]
                        );
                }
            }

            DB::table('responden_tipe1')
                ->join('responden', 'responden.id', '=', 'responden_tipe1.id_responden')
                ->where([['username', Auth::guard('apiResponden')->user()->username]
                    , ['responden_tipe1.uid_survei', $request->uid_survei]
                    , ['isSelfEnum', '1']])
                ->update(
                    ['responden_tipe1.status' => '4'
                        , 'responden_tipe1.updated_at' => date("Y-m-d H:i:s")]
                );
            DB::table('responden_tipe2')
                ->join('responden', 'responden.id', '=', 'responden_tipe2.id_responden')
                ->where([['username', Auth::guard('apiResponden')->user()->username]
                    , ['responden_tipe2.uid_survei', $request->uid_survei]
                    , ['isSelfEnum', '1']])
                ->update(
                    ['responden_tipe2.status' => '4'
                        , 'responden_tipe2.updated_at' => date("Y-m-d H:i:s")]
                );

            DB::table('responden')
                ->where([['username', Auth::guard('apiResponden')->user()->username]
                    , ['uid_survei', $request->uid_survei]
                    , ['isSelfEnum', '1']])
                ->update(
                    ['status' => '1'
                        , 'updated_at' => date("Y-m-d H:i:s")]
                );

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
}
