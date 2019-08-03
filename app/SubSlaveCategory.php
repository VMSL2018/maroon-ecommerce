<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSlaveCategory extends Model
{
    public function categories(){
        return $this->belongsTo('App\Category');
    }
    
    public function sub_categories(){
        return $this->belongsTo('App\SubCategory');
    }
}
