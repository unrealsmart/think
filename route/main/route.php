<?php

use think\facade\Route;

// test


// ping
// 目前 Ping 功能主要用于前端。（当前端与服务端无法建立连接时，前端能够定制页面）
Route::any('ping', function () {
    return microtime(true);
});

Route::any('ping-auth', function () {
    return microtime(true);
})
    ->middleware('authentication');


// common
Route::group('/', function () {
    Route::any('avatar/store', 'app\common\controller\AvatarStore@store');

})
    ->middleware('authentication');


// all config
Route::group('all-config', function () {
    Route::any('adp', 'main/AllConfig/adp');
});// ->middleware('authentication');


// administrator route
Route::group('administrator', function () {
    Route::any('verification', 'main/Administrator/verification');
    Route::any('search', 'main/Administrator/search')->middleware('authentication');
});

// administrator resource route
Route::resource('administrator', 'main/Administrator')->middleware('authentication');

// domain
Route::resource('domain', 'main/Domain')->middleware('authentication');

// authority
Route::resource('authority', 'main/Authority')->middleware('authentication');


// authentication
Route::any('authentication/test', 'demo/demo')->middleware('authentication');


// authority
