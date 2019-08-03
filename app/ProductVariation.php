<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    
    protected $table = 'product_variations';
    protected $fillable = [
                            'products_id',
                            'colors_id',
                            'sizes_id',
                            'quantity',
                            'image_url',
                            'created_at',
                            'updated_at'
                        ];
                        
    public function products(){
        return $this->belongsTo('App\Products');
    }
    
    public function sizes(){
        return $this->belongsTo('App\Size');
    }
    
    public function colors(){
        return $this->belongsTo('App\Color');
    }
}
