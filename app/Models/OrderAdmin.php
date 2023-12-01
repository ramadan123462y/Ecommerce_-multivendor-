<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAdmin extends Model
{
    use HasFactory;


    protected $fillable = [
        'status',
        'payment_status',
        'customer_id',
        'store_id',
        'total',
        'payment_method',
    ];

    public function delivered()
    {


        return $this->hasOne(Delivered::class, 'orderadmin_id');
    }

    public function orders()
    {


        return $this->hasMany(Order::class, 'orderadmin_id');
    }


    public function store()
    {

        return $this->belongsTo(Store::class);
    }

    public function customer()
    {


        return $this->belongsTo(Customer::class);
    }

    public function transations()
    {


        return $this->hasMany(OrderAdmin::class, 'orderadmin_id');
    }
}
