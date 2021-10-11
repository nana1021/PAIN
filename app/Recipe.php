<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
     protected $date = [
        'created_at',
        'updated_at',
        'edited_at'
        ];
    
    protected $guarded = array('id');

    public static $rules = array(
        'category_name' => 'required',
        'title' => 'required',
        'material' => 'required',
        'body' => 'required',
    );
    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
