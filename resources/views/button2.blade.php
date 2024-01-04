<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Button2') }}
        </h2>
    </x-slot>
    <div>
      Filter:
      <a href="/button2?kids_number_min=2&kids_number_max=6" class="bg-blue-500 
      hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
       Doar invitatii care au nevoie de cazare
      </a>
    </div>
    <div>
      @if ($products->count() === 0) 
      <div> NU AVEM PRODUSE </div>
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
          <th>Quantity</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if (session('added'))
        <div> Produsul a fost adaugat cu succes in cos</div> 
        @endif
        @foreach($products as $product)
            <tr>
                <td> 
                <img class="product-image" src="{{ asset($product->image) }}" />  
              </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }} </td>
                <td>{{ $product->need_accommodation }} </td>
                <td>{{ $product->expired_at }} </td>
                <td>{{ $product->price }} </td>
                <td>{{ $product->quantity }} </td>
                <td>
                  @if ($product->quantity >= 1)
                  <a href="/cart/{{$product->id}}">
                    Adauga in cos
                  </a>
                  @else
                    <span>Out of stock</span>
                  @endif
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    </div>
</x-app-layout>
