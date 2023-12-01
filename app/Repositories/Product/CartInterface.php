<?php

namespace App\Repositories\Product;


interface CartInterface
{



    public function store_product($request);
    public function save_image($product, $value);
    public function update_product($last_product, $request);
    public function store_colore($product, $request);
    public function get_allprodcut();
    public function get_all_product_store();
    public function find_product($id);
    public function find_image($id);
}
