<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([

    'middleware' => ['auth', 'api']

], function ($router) {
    // responden
    Route::post('responden/auth/logout', 'RespondenApi@logout');
    Route::post('responden/auth/refresh', 'RespondenApi@refresh');
    Route::post('responden/auth/me', 'RespondenApi@me');
    Route::post('responden/listSurvei', 'RespondenApi@listSurvei');
    Route::post('responden/downloadSurvei', 'RespondenApi@downloadSurvei');
    Route::post('responden/refreshSurvei', 'RespondenApi@refreshSurvei');
    Route::post('responden/submitSurvei', 'RespondenApi@submitSurvei');

    //petugas
    Route::post('petugas/auth/logout', 'PetugasApi@logout');
    Route::post('petugas/auth/refresh', 'PetugasApi@refresh');
    Route::post('petugas/auth/me', 'PetugasApi@me');
    Route::post('petugas/listSurvei', 'PetugasApi@listSurvei');
    Route::post('petugas/listResponden', 'PetugasApi@listResponden');
    Route::post('petugas/downloadSurvei', 'PetugasApi@downloadSurvei');
    Route::post('petugas/refreshResponden', 'PetugasApi@refreshResponden');
    Route::post('petugas/submitResponden', 'PetugasApi@submitResponden');

    Route::post('responden/auth/login', 'RespondenApi@login');
    Route::post('petugas/auth/login', 'PetugasApi@login');
});

// Route::post('responden/auth/login', 'RespondenApi@login');
// Route::post('petugas/auth/login', 'PetugasApi@login');
