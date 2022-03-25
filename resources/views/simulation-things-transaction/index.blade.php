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
  <x-slot name="header_page"><i class="bi bi-wallet2"></i> Simulasi Transaksi Barang</x-slot>
  <x-slot name="header_btn">
    <div class="me-5">
      
    </div>
    {{-- <a href="{{ route('export-salary') }}" class="btn btn-sm btn-success">
      <i class="bi bi-file-earmark-excel"></i> Export</a>
    </a> --}}

    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#simulationThingsModal">
      <i class="bi bi-plus"></i> Transaksi</a>
    </button>
  @include('simulation-things-transaction.create')
  
  </x-slot>
  <x-slot name="content_page">
    <div class="row">
      <div class="col-9 align-items-center d-flex mb-3">
        <form id="pay-method-form">
          <div class="form-check form-check-inline align-middle">
            <label class="form-check-label align-middle">Filter Berdasarkan : </label>
          </div>
          <div class="form-check form-check-inline align-middle">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label align-middle" for="inlineCheckbox1">Cash</label>
          </div>
          <div class="form-check form-check-inline align-middle">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label align-middle" for="inlineCheckbox2">e-money/transfer</label>
          </div>
        </form>
      </div>
      <div class="col-3">
        <form id="search-form">
          <div class="input-group mb-3">
            <input type="search" class="form-control rounded" placeholder="Cari..." aria-label="Recipient's username" aria-describedby="button-search" id="search-input">
            {{-- <button class="btn btn-outline-secondary" type="button" id="button-search"><i class="bi bi-search"></i></button> --}}
          </div>
        </form>
      </div>
    </div>
    <table class="table table-striped table-hover text-center border-top-0" id="simulation-things-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Tanggal Beli</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Diskon</th>
          <th>Total Harga</th>
          <th>Jenis Bayar</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </x-slot>
</x-master>
