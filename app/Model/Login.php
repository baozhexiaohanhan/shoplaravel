<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
