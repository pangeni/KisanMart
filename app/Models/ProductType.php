<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    //protected $fillable = [
    //    'name', 'image', 'status', 'shop_id'
    //];

    protected $guarded = [];

    const CREATED_AT = 'CREATED_DATE';
    const UPDATED_AT = null;

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
