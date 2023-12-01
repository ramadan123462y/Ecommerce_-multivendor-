<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\Image;

class ProductModel implements CartInterface
{



    public function store_product($request)
    {


        $product =  Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'categorie_id' => $request->categorie_id,
            'brand_id' => $request->brand_id,
            'small_description' => $request->small_description,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'trending' => $request->trending,
            'status' => $request->status,
            'meta_title' => isset($request->meta_title) ? $request->meta_title : null,
            'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : null,
            'meta_descreption' => isset($request->meta_descreption) ? $request->meta_descreption : null,
            'store_id' => store_saller()->id,
        ]);
        return $product;
    }

    public function save_image($product, $value)
    {


        Image::create([

            'product_id' => $product->id,
            'file_path' => $value->getClientOriginalName(),

        ]);
    }

    public function update_product($last_product, $request)
    {


        $new_product =  $last_product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'categorie_id' => $request->categorie_id,
            'brand_id' => $request->brand_id,
            'small_description' => $request->small_description,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'trending' => $request->trending,
            'status' => $request->status,
            'meta_title' => isset($request->meta_title) ? $request->meta_title : null,
            'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : null,
            'meta_descreption' => isset($request->meta_descreption) ? $request->meta_descreption : null,
        ]);
        return $new_product;
    }

    public function store_colore($product, $request)
    {


        $product->colores()->sync($request->colore);
    }

    public function get_allprodcut()
    {

        $products = Product::paginate(5);
        return $products;
    }
    public function get_all_product_store()
    {

        $products = store_saller()->products()->paginate(5);
        return $products;
    }
    public function find_product($id)
    {

        $product =   Product::find($id);

        return $product;
    }

    public function find_image($id){


        $last_images = Image::where('product_id', $id)->get();

        return $last_images;
    }
}
