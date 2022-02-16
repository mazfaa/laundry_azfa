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
  <x-slot name="header_page"><i class="bi bi-box"></i> Tabel Package</x-slot>
  <x-slot name="header_btn">
    <a href="{{ route('package.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Package</a>
  </x-slot>
  <x-slot name="content_page">
    <table class="table table-bordered text-center" id="package-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Package Name</th>
          <th>Type</th>
          <th>Price</th>
          <th>Created_at</th>
          <th>Updated_at</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($packages as $package)
        <tr>
          <td class="align-middle">{{ $no++; }}</td>
          <td class="align-middle">{{ $package->package_name }}</td>
          <td class="align-middle">{{ $package->type }}</td>
          <td class="align-middle">@currency($package->price)</td>
          <td class="align-middle">{{ $package->created_at }}</td>
          <td class="align-middle">{{ $package->updated_at }}</td>
          <td class="align-middle">
            <a href="{{ route('package.show', $package->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Show</a>
            <a href="{{ route('package.edit', $package->id) }}" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
            <form action="{{ route('package.destroy', $package->id) }}" method="post" class="d-inline">
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
