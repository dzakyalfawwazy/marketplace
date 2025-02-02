<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productdetail extends Model
{
    /** @use HasFactory<\Database\Factories\ProductdetailFactory> */
    use HasFactory;

    protected $table ='productdetails';
    protected $fillable =['idproduct','weight','size','color','baseprice','sellprice','description','image'];

    public function product()
    {
        return $this->belongsTo(product::class, 'idproduct', 'id');
    }
}
