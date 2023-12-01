<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Error;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Image;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Saller;
use App\Repositories\Product\CartInterface;


class ProductController extends Controller
{
    use ImageTrait;
    protected $product;

    public function __construct(CartInterface $product)
    {
        $this->product = $product;
    }
    public function index()
    {
        if (Auth::guard('web')->check()) {
            $products = $this->product->get_allprodcut();
            return view('Admin.Product.product', compact('products'));
        } else {
            $products = $this->product->get_all_product_store();
            return view('Saller.Product.product', compact('products'));
        }
    }


    public function create()
    {

        return view('Saller.Product.Add_prodcut');
    }
    public function store(ProductRequest $request)
    {


        try {
            $product = $this->store_product($request);
            $tags = explode(",", $request->tags);
            $product->tag($tags);
            $this->store_colore($request, $product);
            $this->store_images($request, $product);
            flash()->addSuccess("Product Aded Sucessfully");
        } catch (\Exception $e) {

            flash()->adderror($e->getMessage());
        }
        return redirect()->back();
    }


    private function store_colore($request, $product)
    {


        if (isset($request->colore)) {
            $this->product->store_colore($product, $request);
        }
    }
    private function store_product($request)
    {

        $product = $this->product->store_product($request);
        return $product;
    }
    private function store_images($request, $product)
    {

        if ($request->hasFile('file')) {

            foreach ($request->file('file') as $key => $value) {
                $this->upload_multi_image($value, 'products', 'images');
                $this->product->save_image($product, $value);
            }
        }
    }

    public function edit($id)
    {
        $product = $this->product->find_product($id);
        $product_ids =  $product->colores->pluck('id')->toarray();
        return view('Saller.Product.edit', compact('product', 'product_ids'));
    }


    public function update(UpdateProductRequest $request)
    {

        try {

            $last_product = $this->product->find_product($request->id);

            $this->update_product($last_product, $request);


            $this->delete_images($request);

            $this->store_images($request, $last_product);
            $this->update_colore($request, $last_product);
            flash()->addSuccess("Product Updated Sucessfully");
        } catch (\Exception $e) {
            flash()->adderror($e->getMessage());
        }

        return redirect()->back();
    }
    public function update_colore($request, $last_product)
    {


        if (isset($request->colore)) {
            $last_product->colores()->detach();

            $last_product->colores()->sync($request->colore);

            return true;
        }
    }


    private function delete_images($request)
    {



        if ($request->hasFile('file')) {


            $last_images = $this->product->find_image($request->id);


            foreach ($last_images as $value) {

                $this->delete_image('images\products\\' . $value->file_path);
            }
        }
    }

    private function update_product($last_product, $request)
    {

        $new_product =  $this->product->update_product($last_product, $request);
    }

    public function destroy($id)
    {

        try {

            $last_images = $this->product->find_image($id);


            foreach ($last_images as $value) {

                $this->delete_image('images\products\\' . $value->file_path);
            }

            $this->product->find_product($id)->delete();

            flash()->addSuccess("Product Deleted Sucessfully");
        } catch (\Exception $e) {

            flash()->adderror($e->getMessage());
        }
        return redirect()->back();
    }
}
