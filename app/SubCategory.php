<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function sub_Slave_categories(){
        return $this->hasMany('App\SubSlaveCategory');
    }
}
