<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductsVouchers;
use App\Voucher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Card;

class PvController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $model = Card::all();
        return response($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $model = [];
        $product = Product::findOrFail($request->only(['product_id']));
        $voucher = Voucher::findOrFail($request->only(['voucher_id']));
        if( !ProductsVouchers::where($request->only(['product_id']))->where($request->only(['voucher_id']))->first() ){
            $model = ProductsVouchers::create($request->only(['product_id','voucher_id']));
        }
        return response($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Card::where('id',$id)->delete();
    }
}
