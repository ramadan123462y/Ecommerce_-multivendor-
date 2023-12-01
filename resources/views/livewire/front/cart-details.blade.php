<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <!-- Cart List Title -->
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">

                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>{{ trans('Product Name') }}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{ trans('Quantity') }}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{ trans('Subtotal') }}</p>
                    </div>

                    <div class="col-lg-1 col-md-2 col-12">
                        <p>{{ trans('Remove') }}</p>
                    </div>
                </div>
            </div>

            <!-- Cart Single List list -->

            @foreach ($cart_items as $item)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img
                                    src="{{ URL::asset('images/products/' . $item->product->images[0]->file_path) }}"
                                    alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="{{ url('prodcut_details', $item->product->slug) }}">
                                    {{ $item->product->name }}</a></h5>
                            <p class="product-des">

                                <span><em>{{ trans('Color') }}:</em></span>
                                <input type="color" class="form-control form-control-color" readonly
                                    @if ($item->colore) value="{{ $item->colore->colore }}"

                                @else
                                value="" @endif>
                            </p>
                        </div>


                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="input-group">
                                <div class="col-12">


                                    <div class="input-group w-auto justify-content-end align-items-center">
                                        <button type="button" value="-"
                                            class="button-minus border rounded-circle  icon-shape icon-sm mx-1 "
                                            wire:click="decrease_quantity({{ $item->id }})"
                                            data-field="quantity">-</button>
                                        <input type="text" readonly step="1" max="10"
                                            value="{{ $item->quantity }}" name="quantity"
                                            class="quantity-field border-0 text-center w-25">


                                        <button type="button" value="+"
                                            class="button-plus border rounded-circle icon-shape icon-sm "
                                            wire:click="increase_quantity({{ $item->id }})"
                                            data-field="quantity">+</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ format(($item->subtotal)*($item->quantity)) }}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <button type="button"  class="remove-item"  wire:click="delete_item({{ $item->id }})"
                              ><i class="lni lni-close"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Single List list -->
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>{{ trans('Cart Total Price') }} <span>{{ format($total_items) }}</span></li>
                                    <li>{{ trans('Cart Total Price') }} <span>{{  format($total_items) }}</span></li>
                                    <li>{{ trans('Shipping') }}<span>{{ trans('Pay') }}</span></li>
                                </ul>
                                <div class="button">


                                    <a href="{{url('/checkout') }}" class="btn">{{ trans('Checkout') }}</a>
                                    <a href="product-grids.html" class="btn btn-alt">{{ trans('Continue shopping') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
