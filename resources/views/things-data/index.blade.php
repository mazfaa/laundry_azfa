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
  <x-slot name="header_page"><i class="bi bi-diagram-2-fill"></i> Tabel Barang</x-slot>
  <x-slot name="header_btn">
    <a href="" class="btn btn-sm btn-success">
      <i class="bi bi-file-earmark-excel"></i> Export</a>
    </a>

    <a href="{{ route('export-package') }}" class="btn btn-sm btn-warning">
      <i class="bi bi-box-arrow-in-right"></i> Import</a>
    </a>

    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#thingsDataModal">
      <i class="bi bi-plus"></i> Barang</a>
    </button>
    @include('things-data.create')
  </x-slot>
  <x-slot name="content_page">
    <table class="table table-striped table-hover text-center" id="things-data-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Barang</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Tgl Beli</th>
          <th>Supplier</th>
          <th>Status Barang</th>
          <th>Waktu Update Status</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($things as $thing)
          @include('things-data.edit')
          <tr>
            <td class="align-middle">{{ $no++ }}</td>
            <td class="align-middle">{{ $thing->things_name }}</td>
            <td class="align-middle">
              <span class="badge bg-primary">{{ $thing->qty }}</span>
            </td>
            <td class="align-middle">@currency($thing->price)</td>
            <td class="align-middle">
              <span class="badge bg-primary">{{ $thing->pay_date }}</span>
            </td>
            <td class="align-middle">{{ $thing->supplier }}</td>
            <td class="align-middle">
              <select class="form-select form-select-sm" aria-label=".form-select example"
                  name="things_status">
                  @if (isset($thing->things_status))
                      <option value="{{ $thing->things_status }}" selected>
                      {{ $thing->things_status }}</option>
                  @endif
                  <option value="Diajukan">Diajukan</option>
                  <option value="Tersedia">Tersedia</option>
                  <option value="Habis">Habis</option>
              </select>
            </td>
            <td class="align-middle">
              <span class="badge bg-primary">{{ $thing->updated_status_date }}</span>
            </td>
            <td class="align-middle">
              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                  data-bs-target="#editThingsDataModal{{ $thing->id }}">
                  <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                  data-bs-target="#deleteThingsDataModal{{ $thing->id }}">
                  <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
          @include('things-data.delete')
        @endforeach
      </tbody>
    </table>
  </x-slot>
</x-master>
