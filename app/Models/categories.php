<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriesFactory> */
    use HasFactory;
    protected $table ='productcategory';
    // protected $fillable = ['categoriesname','remarks','icon'];
    protected $guarded = 'id';

    // Relasi One-to-Many: Kategori memiliki banyak Produk
    public function products()
    {
        return $this->hasMany(product::class, 'category_id', 'id');
    }
}
