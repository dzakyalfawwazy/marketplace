<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'category_id', 'desc'];

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id', 'id');
    }
    public function productsdetail()
    {
        return $this->hasMany(productdetail::class, 'products_id', 'id');
    }
}
