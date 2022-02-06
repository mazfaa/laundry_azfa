<x-master>
  <x-slot name="status">
    @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
    @elseif (session('deleted'))
        <div class="alert alert-danger">
          {{ session('deleted') }}
        </div>
    @endif
  </x-slot>
  <x-slot name="header_page">Tabel Package</x-slot>
  <x-slot name="header_btn">
    <a href="{{ route('package.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Package</a>
  </x-slot>
  <x-slot name="content_page">
    <table class="table table-bordered" id="package-table">
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
          <td>{{ $no++; }}</td>
          <td>{{ $package->package_name }}</td>
          <td>{{ $package->type }}</td>
          <td>@currency($package->price)</td>
          <td>{{ $package->created_at }}</td>
          <td>{{ $package->updated_at }}</td>
          <td>
            <a href="{{ route('package.show', $package->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Show</a>
            <a href="{{ route('package.edit', $package->id) }}" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
            <form action="{{ route('package.destroy', $package->id) }}" method="post">
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
