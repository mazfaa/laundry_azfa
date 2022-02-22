<x-master>
  <x-slot name="status">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @elseif (session('deleted'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleted') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  </x-slot>
  <x-slot name="header_page"><i class="bi bi-shop"></i> Tabel Outlet</x-slot>
  <x-slot name="header_btn">
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#outletModal">
      <i class="bi bi-plus"></i> Add Outlet
    </button>
    @include('outlet.create')
  </x-slot>
  <x-slot name="content_page">
    <table class="table table-bordered text-center align-items-center" id="outlet-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Outlet Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Created_at</th>
          <th>Updated_at</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($outlets as $outlet)
        @include('outlet.edit')
        <tr>
          <td class="align-middle">{{ $no++; }}</td>
          <td class="align-middle">{{ $outlet->name }}</td>
          <td class="align-middle">{{ $outlet->address }}</td>
          <td class="align-middle">{{ $outlet->phone }}</td>
          <td class="align-middle">{{ $outlet->created_at }}</td>
          <td class="align-middle">{{ $outlet->updated_at }}</td>
          <td class="align-middle">
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editOutletModal{{ $outlet->id }}">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOutletModal{{ $outlet->id }}">
              <i class="bi bi-trash"></i> Delete
            </button>
          </td>
        </tr>
        @include('outlet.delete')
        @endforeach
      </tbody>
    </table>
  </x-slot>
</x-master>
