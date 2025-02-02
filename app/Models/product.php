<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['nameproduct', 'idcategory', 'description'];

    public function category()
    {
        return $this->belongsTo(categories::class, 'idcategory', 'id');
    }
    public function productsdetail()
    {
        return $this->hasMany(productdetail::class, 'idproduct', 'id');
    }
}
