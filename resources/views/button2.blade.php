<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Button2') }}
        </h2>
    </x-slot>
    <div>
    <table class="table-auto" style="color:white">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Need accommodation</th>
      <th>Expired At</th>
      <th>Price</th>
      <th>Quantity</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }} </td>
            <td>{{ $product->need_accommodation }} </td>
            <td>{{ $product->expired_at }} </td>
            <td>{{ $product->price }} </td>
            <td>{{ $product->quantity }} </td>
        </tr>
    @endforeach
  </tbody>
</table>
    </div>
</x-app-layout>
