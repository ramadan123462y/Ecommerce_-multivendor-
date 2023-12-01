<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'colore_id',
        'quantity',
        'subtotal',
    ];

    public function cart()
    {


        return $this->belongsTo(Cart::class);
    }

    public function product()
    {

        return $this->belongsTo(Product::class);
    }
    public function colore()
    {

        return $this->belongsTo(Colore::class);
    }
}
