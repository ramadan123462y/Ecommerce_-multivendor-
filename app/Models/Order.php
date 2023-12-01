<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'status',
        'payment_status',
        'customer_id',
        'store_id',
        'total',
        'payment_method',
        'orderadmin_id'
    ];

    public function orderitems()
    {


        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function orderadmin()
    {


        return $this->belongsTo(OrderAdmin::class, 'orderadmin_id');
    }


    public function store()
    {

        return $this->belongsTo(Store::class);
    }

    public function customer()
    {


        return $this->belongsTo(Customer::class);
    }

    public function address_orders()
    {


        return $this->hasMany(AddressOrder::class);
    }

    public function billingAddress()
    {


        return $this->hasOne(AddressOrder::class, 'order_id', 'id', 'id')->where('type', 'billing');
    }
    public function shippingAddress()
    {


        return $this->hasOne(AddressOrder::class, 'order_id', 'id', 'id')->where('type', 'shipping');
    }
}
