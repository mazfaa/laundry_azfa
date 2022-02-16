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
    <a href="{{ route('outlet.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Outlet</a>
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
        <tr>
          <td class="align-middle">{{ $no++; }}</td>
          <td class="align-middle">{{ $outlet->name }}</td>
          <td class="align-middle">{{ $outlet->address }}</td>
          <td class="align-middle">{{ $outlet->phone }}</td>
          <td class="align-middle">{{ $outlet->created_at }}</td>
          <td class="align-middle">{{ $outlet->updated_at }}</td>
          <td class="align-middle">
            <a href="{{ route('outlet.show', $outlet->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Show</a>
            <a href="{{ route('outlet.edit', $outlet->id) }}" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
            <form action="{{ route('outlet.destroy', $outlet->id) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </x-slot>
</x-master>
