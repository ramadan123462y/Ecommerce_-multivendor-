<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
        'file_name',

    ];


    // public function scopeGetcategorie(Builder $builder, $id)
    // {
    //     $builder->where('id', $id);
    // }
}
