<div>

  <input wire:model="search" type="text" placeholder="جستجوی محصول مورد نظر..." style="width: 533px;"/>

  <ul>
    @foreach($products as $product)
      <li>
        <a href="{{ \Illuminate\Support\Facades\URL::to("product/$product->slug") }}">{{ $product->fa_title }}</a>
      </li> <br>
    @endforeach
  </ul>
</div>
