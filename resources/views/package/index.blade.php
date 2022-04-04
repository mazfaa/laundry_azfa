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
  <x-slot name="header_page"><i class="bi bi-box"></i> Tabel Paket</x-slot>
  <x-slot name="header_btn">
    <a href="{{ route('package.export') }}" class="btn btn-sm btn-success">
        <i class="bi bi-file-earmark-excel"></i> Export</a>
    </a>

    <button type="button" class="btn btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#importPackageModal">
        <i class="bi bi-file-earmark-excel"></i> import</a>
    </button>

      @include('package.import')

    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#packageModal">
      <i class="bi bi-plus"></i> Paket</a>
    </button>
    @include('package.create')
  </x-slot>
  <x-slot name="content_page">
    <table class="table table-striped table-hover text-center" id="package-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Outlet Id</th>
          <th>Nama Paket</th>
          <th>Jenis</th>
          <th>Harga</th>
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
