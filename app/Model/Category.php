<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'ecs_category';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
