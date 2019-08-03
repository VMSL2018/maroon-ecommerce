<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ='products';
    protected $fillable = [
                            'sku',
                            'categories_id',
                            'sub_categories_id',
                            'sub_slave_categories_id',
                            'product_title',
                            'product_sub_title',
                            'product_description',
                            'price',
                            'discount_price',
                            'image_url',
                            'slug',
                            'created_at',
                            'updated_at'
                        ];
                        
    public function product_variation(){
        return $this->hasMany('App\ProductVariation');
    }
    
    public function categories(){
        return $this->belongsTo('App\Category');
    }
    public function sub_categories(){
        return $this->belongsTo('App\SubCategory');
    }
    public function sub_slave_categories(){
        return $this->belongsTo('App\SubSlaveCategory');
    }
}


