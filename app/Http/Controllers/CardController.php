<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Card;

class CardController extends Controller
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
    	$input = $request->all();
        if($input['id']){
            $product = Product::findOrFail($input['id']);
            $model = (new Card)->store($product);
            return response($model);
        }
        return [];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($msg)
    {
        $model = Card::all();
        $count = 0;
        foreach($model as $card){
            $card->delete();
            $count++;
        }
        return [$count];
    }
}
