<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\todo;

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
/*
    header('Content-Type: application/json');
    echo json_encode($tareas);
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('list', function () {
    $data = todo::select('id', 'title', 'description','state')->get();
    return $data;
});

Route::post('create', function (Request $request) {
    $data = $request->all();
    header('Content-Type: application/json');
    echo json_encode($data);
});
