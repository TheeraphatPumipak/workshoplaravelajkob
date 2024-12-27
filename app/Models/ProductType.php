<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';
    protected $fillable =['name'];

    public function products(){
        return $this->hasMany(Product::class,'product_type_id','id');
    } 
}
