<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transation extends Model
{
    use HasFactory;
    protected $fillable = [
        'mount',
        'orderadmin_id',
        'currency',
        'method',
        'status',
        'transaction_id',
        'tranaction_data',
    ];
    public function orderadmin()
    {


        return $this->belongsTo(OrderAdmin::class, 'orderadmin_id');
    }
}
