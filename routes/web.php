<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
Route::get('/', function () {
	$subs = DB::table('subs')->get();
    return view('welcome', [
'subs' => $subs
]);
});

Route::get('/admin/podstranky', function () {
    return view('admin.podstranky.pridaj');

});

Route::get('/admin', function () {
    return view('admin.login');

});

Route::post('/addsub', function (Request $request) {
	DB::table('subs')->insert(
	['subname' => $request->subname, 'subhref' => $request->subhref]
	);
	return redirect('/');
});

