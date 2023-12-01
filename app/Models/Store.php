<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Store extends Model
{
    use HasFactory;
    use  Notifiable;
    protected $fillable = [


        'name',
        'slug',
        'description',
        'image_logo',
        'image_cover',
        'status',

    ];
    public function products()
    {

        return $this->hasMany(Product::class);
    }
    public function saller()
    {

        return $this->hasOne(Saller::class);
    }


    public function orders()
    {


        return $this->hasMany(Order::class);
    }
}
