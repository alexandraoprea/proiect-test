<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My orders') }}
        </h2>
    </x-slot>
    <div>
      @if ($orders->count() === 0) 
      <div> NU AVEM COMENZI </div>
      @else 
        <table class="table-auto" style="color:white">
        <thead>
        <tr>
          <th>ORDER ID</th>
          <th>ORDER DATE</th>
          <th>ORDER STATUS</th>
          <th>ADDRESS</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->status }} </td>
                <td>{{ $order->address }} </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    </div>
</x-app-layout>
