<div class="checkout-sidebar-price-table mt-30">
    <h5 class="title">{{ trans('Pricing Table') }}</h5>

    <div class="sub-total-price">


        @foreach ($cart_items as $item)
            <div class="total-price">
                <p class="value">{{ $item->product->name }}:(Q{{ $item->quantity }})</p>
                <p class="price">{{ format($item->quantity * $item->subtotal) }}</p>
            </div>
        @endforeach

    </div>

    <div class="total-payable">
        <div class="payable-price">
            <p class="value">{{ trans('Total Price') }}:</p>
            <p class="price">{{ format($total_items) }}</p>
        </div>
    </div>

</div>
