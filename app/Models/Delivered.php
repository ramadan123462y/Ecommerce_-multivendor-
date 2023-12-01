<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivered extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderadmin_id',
        'x',
        'y',
        'status',
    ];

    public function orderadmin()
    {

        return $this->belongsTo(OrderAdmin::class, 'orderadmin_id');
    }
}
