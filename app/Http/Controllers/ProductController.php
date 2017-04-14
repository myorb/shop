<?php

namespace App\Http\Controllers;

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
        //$model = Product::paginate(5);
        return response(['data'=>[['title'=>'ok','description'=>'pkkk']]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	$input = $request->all();
        $create = Product::create($input);
        return response($create);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $Product = Product::find($id);
        return response($Product);
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
        $Product = Product::find($id);
        return response($Product);
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
}
