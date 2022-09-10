<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function () {
    echo "<pre>";
    // Create some fixed size array 
    $gfg = new SplQueue();

    $gfg[] = 1;
    $gfg[] = 5;
    $gfg[] = 1;
    $gfg[] = 11;
    $gfg[] = 15;
    $gfg[] = 17;

    foreach ($gfg as $elem) {
        echo $elem . "\n";
    }

    $gfg->dequeue();
    $gfg->dequeue();
    $gfg->dequeue();

    // Print result after dequeue 
    foreach ($gfg as $elem) {
        echo "dequeue:" . $gfg->dequeue() . "\n";
    }
    echo "</pre>";
});
