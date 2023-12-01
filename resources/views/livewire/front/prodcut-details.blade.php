<div class="col-lg-6 col-md-12 col-12">
    <div class="product-info">
        <h2 class="title">{{ $product->name }}</h2>
        <p class="category"><i class="lni lni-tag"></i> {{ trans('Drones') }}: {{ $colore_id }}
            {{ $quantity }}<a href="javascript:void(0)">{{ $product->categorie->name }}</a></p>
        <h3 class="price">{{ format($product->selling_price) }}<span>{{ format($product->original_price) }}</span>
        </h3>
        <p class="info-text">{{ $product->description }}</p>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="form-group color-option">
                    <label class="title-label" for="size">{{ trans('Choose color') }}</label>
                    @foreach ($product->colores as $color)
                        <div class="single-checkbox">
                            <input type="radio" wire:model="colore_id" id="colore-{{ $color->id }}" name="color"
                                value="{{ $color->id }}">
                            <label for="colore-{{ $color->id }}"><span
                                    style="background-color: {{ $color->colore }}; width: 20px; height: 20px; display: inline-block; border-radius: 50%;"></span></label>
                        </div>
                    @endforeach
                </div>
                <x-inline-validation name="colore_id"></x-inline-validation>
            </div>

            <div class="col-lg-4 col-md-4 col-12">
                <div class="form-group quantity">
                    <label for="color">{{ trans('Quantity') }}</label>
                    <input type="number" wire:model="quantity" class="form-control" name="quantity">
                </div>
                <x-inline-validation name="quantity"></x-inline-validation>
            </div>
        </div>
        <br>
        <br>
        <div>
            <strong>{{ trans('Tages') }}:</strong>
            @foreach ($product->tags as $tag)
                <span class="tag"
                    style="background-color: yellow; border-radius: 4px; padding: 4px 8px;">{{ $tag->name }}</span>
            @endforeach
        </div>
        <br>
<br>
        <div class="bottom-content">
            <div class="row align-items-end">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="button cart-button">
                        <button class="btn"
                            wire:click="add_cart({{ $product->id }},{{ $product->selling_price }},)"
                            style="width: 100%;">{{ trans('Add to Cart') }}</button>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-12">
                    <div class="wish-button">
                        <button class="btn"><i class="lni lni-heart"></i> {{ trans('To Wishlist') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
