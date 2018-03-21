<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemModel extends Model
{
    //
    public $timestamps = false;
    protected $table = "item";
    protected $fillable = ['id_user','name', 'price','stock'];
    protected $guarded = [];

}
