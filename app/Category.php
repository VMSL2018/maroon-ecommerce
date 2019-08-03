<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    
    public function sub_categories(){
        return $this->hasMany('App\SubCategory');
    }
    
    public function sub_slave_categories(){
        return $this->hasMany('App\SubSlaveCategory');
    }
}
