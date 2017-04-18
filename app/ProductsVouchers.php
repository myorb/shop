<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsVouchers extends Model
{
    public $fillable = ['product_id','voucher_id'];

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function voucher()
    {
        return $this->hasOne('App\Voucher', 'id', 'voucher_id');
    }

}
