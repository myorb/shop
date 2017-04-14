<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public $fillable = ['start_date','end_date','discount'];
}
