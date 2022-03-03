@if (Cart::get($product->id))
<div class="btn-group" role="group" aria-label="Basic example" id="success_{{$product->id}}">
    <button type="button" class="btn btn-primary" onclick="cartDecrement('{{$product->id}}')">-</button>
    <button type="button" class="btn btn-primary" id="qty_{{$product->id}}">
        {{Cart::get($product->id)->quantity}}
    </button>
    <button type="button" class="btn btn-primary" onclick="cartIncrement('{{$product->id}}')">+</button>
</div>
@else
<button class="btn btn-default btn-block" id="add_to_cart_{{$product->id}}" type="button"
    onclick="addToCart('{{$product->id}}')">ADD TO CART</button>
<div class="btn-group hidden" role="group" aria-label="Basic example" id="success_{{$product->id}}">
    <button type="button" class="btn btn-primary" onclick="cartDecrement('{{$product->id}}')">-</button>
    <button type="button" class="btn btn-primary" id="qty_{{$product->id}}">
    </button>
    <button type="button" class="btn btn-primary" onclick="cartIncrement('{{$product->id}}')">+</button>
</div>
@endif
