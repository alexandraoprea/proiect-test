<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My cart') }}
        </h2>
    </x-slot>
    <div>
      @if ($carts->count() === 0) 
      <div> NU AVEM PRODUSE IN COS </div>
      @else 
        <table class="table-auto" style="color:white">
        <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Description</th>
          <th>Need accommodation</th>
          <th>Expired At</th>
          <th>Price</th>
          <th></th>
          <th>Quantity</th>
          <th></th>
          <th>Price per product</th>
        </tr>
      </thead>
      <tbody>
        @foreach($carts as $cart)
            <tr>
                <td> 
                <img class="product-image" src="{{ asset($cart->product->image) }}" />  
              </td>
                <td>{{ $cart->product->name }}</td>
                <td>{{ $cart->product->description }} </td>
                <td>{{ $cart->product->need_accommodation }} </td>
                <td>{{ $cart->product->expired_at }} </td>
                <td>{{ $cart->product->price }} </td>
                <td><a href="/decrease-quantity/{{$cart->product_id}}">-</a></td>
                <td>{{ $cart->quantity }} </td>
                <td>
                    @if ($cart->product->quantity >= $cart->quantity + 1)
                    <a href="/increase-quantity/{{$cart->product_id}}">+</a>
                    @endif
                </td>
                <td> {{ $cart->product->price * $cart->quantity }} RON</td>
            </tr>
        @endforeach
      </tbody>
    </table>
    <div style="color: white"> Total price: {{ Auth::user()->cartPrice() }}</div>
    <a href="/checkout">
            <x-primary-button class="ms-3">
                {{ __('Checkout') }}
            </x-primary-button>
    </a>
    @endif
    </div>
</x-app-layout>
