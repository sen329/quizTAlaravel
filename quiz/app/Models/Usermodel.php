<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usermodel extends Model
{
    //
    public $timestamps = false;
    protected $table = "user";
    protected $fillable = ['name', 'email', 'password'];
    protected $guarded = [];
}
