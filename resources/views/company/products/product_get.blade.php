
@if($products)
<tr id="{{ $products->id }}">
    <td ><input type="hidden" value="{{ $products->id}}" name="product_name_table[]">{{ $products->name}}</td>
    <td ><input type="text" class="rate-update" value="{{ $products->rate}}" name="product_rate_table[]" style="width: 70px;" ></td>
    <td ><input type="text" class="qty" id="qty_{{ $products->quantity }}" value="{{ $products->quantity}}" name="product_quantity_table[]" style="width: 70px;" ></td>
    <td ><input type="text" class="total" value="{{ ($products->rate) * ($products->quantity)}}" name="product_total_table[]" style="width: 70px;"  readonly></td>
</tr>
@endif

