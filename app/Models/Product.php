<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    protected $fillable = [
        'name',
        'slug',
        'categorie_id',
        'brand_id',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_descreption',
        'store_id'
    ];

    // -----------relation ship---------------

    public function brand()
    {

        return $this->belongsTo(Brand::class);
    }
    public function categorie()
    {

        return $this->belongsTo(Categorie::class);
    }
    public function images()
    {

        return $this->hasMany(Image::class);
    }
    public function colores()
    {


        return $this->belongsToMany(Colore::class, 'product_colore');
    }
    public function store()
    {

        return $this->belongsTo(Store::class);
    }


    // ------------local scope-------------------


    public function scopeActive(Builder $builder)
    {

        $builder->where('status', 1);
    }

    protected static function boot()
    {
        parent::boot();
        static::observe(ProductObserver::class);
    }
}
