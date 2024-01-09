<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Total adulti: {{ $adultsNumber }} | Total kids: {{ $kidsNumber }} | Families need accommodation: {{ $needAccommodationNumber}}
        </h2>
    </x-slot>

    <table class="table-auto text-white">
  <thead>
    <tr>
      <th>Invitation Id</th>
      <th>Name</th>
      <th>Confirmation</th>
      <th>Need accommodation</th>
      <th>Food prefferences</th>
      <th>Adults number</th>
      <th>Kids number</th>
    </tr>
  </thead>
  <tbody>
    @foreach($confirmations as $confirmation)
    <tr>
      <td>{{ $confirmation->invitation_id }}</td>
      <td>{{ $confirmation->name }}</td>
      <td>{{ $confirmation->confirmation }}</td>
      <td>{{ $confirmation->need_accommodation }}</td>
      <td>{{ $confirmation->food_prefferences }}</td>
      <td>{{ $confirmation->adults_number }}</td>
      <td>{{ $confirmation->kids_number }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    
</x-app-layout>
