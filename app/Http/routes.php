<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('app');
});


Route::resource('products', 'ProductController');
Route::resource('vouchers', 'VoucherController');
Route::resource('pv', 'PvController');
Route::resource('cards', 'CardController');

// Templates
Route::group(array('prefix'=>'/templates/'),function(){
    Route::get('{template}', array( function($template)
    {
        $template = str_replace(".html","",$template);
        View::addExtension('html','php');
        return View::make('templates.'.$template);
    }));
});


Route::any('add/voucher', function (Request $request) {
    $product = \App\Product::findOrFaill($request->only(['product_id']));
    $voucher = \App\Voucher::findOrFaill($request->only(['voucher_id']));
    $model = \App\ProductVoucher::create($request->only(['product_id','voucher_id']));
    return response($model);
});