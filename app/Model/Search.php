<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'shop_goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
