<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
