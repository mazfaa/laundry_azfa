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
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#packageModal">
      <i class="bi bi-plus"></i> Add Package</a>
    </button>
    @include('package.create')
  </x-slot>
  <x-slot name="content_page">
    <table class="table table-bordered text-center" id="package-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Outlet Id</th>
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
        @include('package.edit')
        <tr>
          <td class="align-middle">{{ $no++; }}</td>
          <td class="align-middle">{{ $package->outlet_id }}</td>
          <td class="align-middle">{{ $package->package_name }}</td>
          <td class="align-middle">
            <span class="badge bg-primary">{{ $package->type }}</span>
          </td>
          <td class="align-middle">@currency($package->price)</td>
          <td class="align-middle">{{ $package->created_at }}</td>
          <td class="align-middle">{{ $package->updated_at }}</td>
          <td class="align-middle">
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editPackageModal{{ $package->id }}">
              <i class="bi bi-pencil-square"></i> Edit
            </button>
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePackageModal{{ $package->id }}">
              <i class="bi bi-trash"></i> Delete
            </button>
          </td>
        </tr>
        @include('package.delete')
        @endforeach
      </tbody>
    </table>
  </x-slot>
</x-master>
