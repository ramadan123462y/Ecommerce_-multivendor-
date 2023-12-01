<section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <!-- Start Product Sidebar -->
                <div class="product-sidebar">
                    <!-- Start Single Widget -->
                    <div class="single-widget search">
                        <h3>{{ trans('Search Product') }}</h3>
                        <form action="#">
                            <input type="text" wire:model="searchproduct" placeholder="{{ trans('Search Here') }}...">
                            <button type="button"   wire:click="search_product"   ><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <div class="single-widget">
                        <h3>{{ trans('All Categories') }}</h3>
                        <ul class="list">

                            @foreach ($categories as $categorie)
                                <li>

                                    <a type="button"
                                        wire:click="filterByCategory({{ $categorie->id }})">{{ $categorie->name }}</a><span></span>

                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <div class="single-widget range">
                        <h3>Price Range</h3>
                        <input type="range" wire:model="price" class="form-range" name="range" step="1" min="10"
                            max="1000" value="10" onchange="rangePrimary.value=value">
                        <div class="range-inner">
                            <label>$</label>
                            <input type="text" id="rangePrimary" placeholder="100" />
                        </div>
                    </div>

                    <div class="single-widget condition">
                        <h3>{{ trans('Filter by Brand') }}</h3>


                        @foreach ($brands as $brand)
                            <div class="form-check">
                                <input wire:model="selectedBrands" class="form-check-input" type="checkbox" value="{{ $brand->id }}" id="brand_{{ $brand->id }}">
                                <label class="form-check-label" for="brand_{{ $brand->id }}">
                                    {{ $brand->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Single Widget -->
                </div>
                <!-- End Product Sidebar -->
            </div>
            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-12">
                                <div class="product-sorting">


                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab"
                                            aria-controls="nav-grid" aria-selected="true"><i
                                                class="lni lni-grid-alt"></i></button>
                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab"
                                            aria-controls="nav-list" aria-selected="false"><i
                                                class="lni lni-list"></i></button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                            aria-labelledby="nav-grid-tab">
                            <div class="row">

                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="product-image">
                                                <img src="{{ URL::asset('images/products/' . $product->images[0]->file_path) }}"
                                                    alt="#">
                                                <div class="button">
                                                    <button  type="button" class="btn" wire:click="add_cart({{ $product->id }},{{ $product->selling_price }})"><i
                                                        class="lni lni-cart"></i>{{ trans('Add to Cart') }} </button>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category">{{ $product->categorie->name }}</span>
                                                <h4 class="title">
                                                    <a
                                                        href="{{ url('prodcut_details', $product->slug) }}">{{ $product->name }}</a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 {{ trans('Review') }}(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <span>{{ format($product->selling_price) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Pagination -->
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            {{-- {{ $products->links() }} --}}
                                            {{-- {{ $products->links() }} --}}
                                        </ul>
                                    </div>
                                    <!--/ End Pagination -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                            <div class="row">

                                @foreach ($products as $product)
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="product-image">
                                                        <img src="{{ URL::asset('images/products/' . $product->images[0]->file_path) }}"
                                                            alt="#">
                                                        <div class="button">

                                                            <button  type="button" class="btn" wire:click="add_cart({{ $product->id }},{{ $product->selling_price }})"><i
                                                                class="lni lni-cart"></i>{{ trans('Add to Cart') }} </button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-12">
                                                    <div class="product-info">
                                                        <span class="category">{{ $product->categorie->name }}</span>
                                                        <h4 class="title">
                                                            <a
                                                                href="{{ url('prodcut_details', $product->slug) }}">{{ $product->name }}</a>
                                                        </h4>
                                                        <ul class="review">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star"></i></li>
                                                            <li><span>4.0 {{ trans('Review') }}(s)</span></li>
                                                        </ul>
                                                        <div class="price">
                                                            <span>{{ format($product->selling_price) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Pagination -->
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            {{-- {{ $products->links() }} --}}
                                            {{-- {{ $products->onEachSide(1)->links() }} --}}
                                        </ul>
                                    </div>
                                    <!--/ End Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
