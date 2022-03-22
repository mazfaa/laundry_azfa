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
    <x-slot name="header_page"><i class="bi bi-send"></i> Penjemputan Laundry</x-slot>
    <x-slot name="header_btn">
      {{-- <a href="{{ route('export-pickup') }}" class="btn btn-sm btn-success">
          <i class="bi bi-file-earmark-excel"></i> Export</a>
      </a> --}}

      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pickupModal">
        <i class="bi bi-plus"></i> Tambah Data</a>
      </button>
      @include('pick-up.create')
    </x-slot>
    <x-slot name="content_page">
      <table class="table table-striped table-hover text-center" id="pickup-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Petugas Penjemputan</th>
            <th>Status</th>
            <th>Settings</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($pickups as $pickup)
          @include('pick-up.edit')
          <tr>
            <td class="align-middle">{{ $no++; }}</td>
            <td class="align-middle">{{ $pickup->name }}</td>
            <td class="align-middle">{{ $pickup->address }}</td>
            <td class="align-middle">
              <span class="badge bg-primary">{{ $pickup->phone }}</span>
            </td>
            <td class="align-middle">{{ $pickup->pickup_officer }}</td>
            <td class="align-middle">{{ $pickup->status }}</td>
            <td class="align-middle">
              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editPickupModal{{ $pickup->id }}">
                <i class="bi bi-pencil-square"></i> Edit
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePickupModal{{ $pickup->id }}">
                <i class="bi bi-trash"></i> Delete
              </button>
            </td>
          </tr>
          @include('pick-up.delete')
          @endforeach
        </tbody>
      </table>
    </x-slot>
  </x-master>
