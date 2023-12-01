<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CredentialStripe extends Model
{
    use HasFactory;

    protected $fillable = [
        'Publishable_key',
        'Secret_key',
    ];
}
