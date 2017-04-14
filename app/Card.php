<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public $fillable = ['user_id','product_id','product_name','product_amount','discount_size'];

    public function store(Product $product)
    {
        $this->product_id = $product->id;
        $this->product_name = $product->name;
        $this->product_amount = $this->countAmount($product);
        $this->discount_size = $this->countDiscount($product);
        return $this->save();
    }

    private function countDiscount(Product $product)
    {
        $model = ProductVoucher::where('product_id',$product->id)->get();
        $discount = 0;
        foreach($model as $pv){
            $da = $product->amount/100 * $pv->discount;
            $discount += $da;
        }
        return $discount;
    }

    private function countAmount(Product $product)
    {
        return $product->price - $this->countDiscount($product);
    }
}
