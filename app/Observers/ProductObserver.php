<?php

namespace App\Observers;


use App\Models\Product;
use App\Models\Image;

class ProductObserver
{




    public function deleted(Product $product)
    {
        Image::where('product_id', $product->id)->delete();
    }


}
