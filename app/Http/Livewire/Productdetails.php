<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cart as CartModel;
use App\Models\Cartitem;
use App\Models\Customer;

class Productdetails extends Component

{
    public $products;

    public $brands;
    public $categories;
    public $selectedCategory;
    public $selectedBrands = [];
    public $searchproduct;
    public $price;
    use WithPagination;
    public $paginationTheme = 'bootstrap';

    public function render()
    {
        $query = Product::with('colores', 'store');
        // ------------categorie---------------------

        if ($this->selectedCategory) {
            $query->where('categorie_id', $this->selectedCategory);
        }


        // ------------brands---------------------

        if ($this->selectedBrands) {
            $query->whereIn('brand_id', $this->selectedBrands);
        }
        // ------------serch---------------------

        if ($this->searchproduct) {
            $query->where('name', 'like', '%' . $this->searchproduct . '%');
        }
        // ------------brice---------------------

        if ($this->price) {
            $query->where('selling_price','>=', $this->price);
        }


        // -----------------------
        $this->products = $query->get();
        $this->brands = Brand::all();
        $this->categories = Categorie::all();



        return view('livewire.productdetails', [

            'products' => $this->products,
            'brands' => $this->brands,
            'categories' => $this->categories,
        ]);
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->filterby_categorie($this->selectedCategory);
    }

    public function filterby_categorie($categorie_id)
    {
        $this->products = Product::with('colores', 'store')->where('categorie_id', $categorie_id)->get();
    }


    public function filterby_brands()
    {
        $this->products = Product::whereIn('brand_id', $this->selectedBrands)->paginate(10);
    }


    public function search_product()
    {

        $this->products = Product::where('name', 'like', '%' . $this->searchproduct . '%')->get();
    }




    public function add_cart($product_id, $price, $colore_id = null, $quantity = 1)
    {


        if (!(Auth::guard('customer')->check())) {

            flash()->addError("Please login First");

            return redirect('login');
        }


        if (!(CartModel::where('customer_id', Auth::guard('customer')->user()->id)->first())) {

            $cart = CartModel::create([

                'customer_id' => Auth::guard('customer')->user()->id

            ]);
        }

        $cart_id = Customer::find(Auth::guard('customer')->user()->id)->cart->id;

        $product = Product::find($product_id);


        if ($product->quantity < $quantity) {

            flash()->addError("Product mount   is least ");
        } else {

            if (Cartitem::where('cart_id', $cart_id)->where('product_id', $product_id)->first()) {
                flash()->addError("Product already  in cart");
            } else {

                Cartitem::create([
                    'cart_id' => $cart_id,
                    'product_id' => $product_id,
                    'colore_id'=>null,
                    'quantity' => $quantity,
                    'subtotal' => $price
                ]);

                // event----cart--------------

                $this->emit('view_cart');
                // event----cart--------------
                flash()->addSuccess("Prodcut Aded Sucessfully");
            }
        }
    }

}
