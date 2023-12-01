<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{ $count_items }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $count_items }} {{ trans('Items') }}</span>
            {{-- @if ()

            @endif --}}
            <a href="{{ url('cart') }}">{{ trans('View Cart') }}</a>
        </div>
        <ul class="shopping-list">

            @foreach ($cart_items as $item)
                <li>
                    <a href="javascript:void(0)" wire:click="delete_item({{ $item->id }})" class="remove"
                        title="Remove this item"><i class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img" href="product-details.html"><img
                                src="{{ URL::asset('images/products/' . $item->product->images[0]->file_path) }}"
                                alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="{{ url('prodcut_details', $item->product->slug) }}">
                                {{ $item->product->name }}</a></h4>
                        <p class="quantity">{{ $item->quantity }}x-<span
                                class="amount">{{ format($item->subtotal) }}</span></p>
                    </div>
                </li>
            @endforeach


        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">{{ format($total_items) }}</span>
            </div>
            <div class="button">
                <a href="checkout.html" class="btn animate">{{ trans('Checkout') }}</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
