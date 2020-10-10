<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
     protected $table = 'ecs_region';
    protected $primaryKey = 'region_id';
    public $timestamps = false;

}
