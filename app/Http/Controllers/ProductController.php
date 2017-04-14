<?php

namespace App\Http\Controllers;

use App\ProductVoucher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $model = Product::paginate(5);
        return response($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        return response(Product::create($request->all()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return response(Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
    	$input = $request->all();

        Product::where("id",$id)->update($input);
        $model = Product::find($id);
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
        return Product::where('id',$id)->delete();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postVoucher(Request $request)
    {
        die('ok');

    }
}
