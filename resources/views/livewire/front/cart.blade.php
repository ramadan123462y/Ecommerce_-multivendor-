<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-12">
            <!-- Start Single Product -->
            <div class="single-product">
                <div class="product-image">
                    <img src="{{ URL::asset('images/products/' . $product->images[0]->file_path) }}" alt="#">
                    <span class="sale-tag">{{ $product->original_price - $product->selling_price }}$</span>
                    <div class="button">

                        <button class="btn" wire:click="add_cart({{ $product->id }},{{ $product->selling_price }})"><i
                                class="lni lni-cart"></i>{{ trans('Add to Cart') }} </button>

                    </div>
                </div>
                <div class="product-info">
                    <span class="category"></span>
                    <h4 class="title">
                        {{-- public/images/products/product-1.jpg --}}
                        <a href="{{ url('prodcut_details', $product->slug) }}">{{ $product->name }}</a>
                    </h4>
                    <ul class="review">
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><i class="lni lni-star-filled"></i></li>
                        <li><span>5.0 {{ trans('Review') }}(s)</span></li>
                    </ul>
                    <div class="price">
                        <span>{{ format($product->selling_price) }}</span>

                        <span class="discount-price">{{ format($product->original_price) }}</span>
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
        </div>
    @endforeach
</div>
