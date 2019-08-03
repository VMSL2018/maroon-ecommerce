<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
                            'invoices_id',
                            'products_id',
                            'colors_id',
                            'sizes_id',
                            'quantity',
                            'sub_total',
                            'created_at',
                            'updated_at'
                        ];
                        
                        
    public function products(){
        return $this->belongsTo('App\Products');
    }
    public function colors(){
        return $this->belongsTo('App\Color');
    }
    public function sizes(){
        return $this->belongsTo('App\Size');
    }
}
