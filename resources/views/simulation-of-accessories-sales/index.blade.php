<x-master>
  <x-slot name="header_page"><i class="bi bi-activity"></i> Penjualan Aksesoris</x-slot>
  <x-slot name="header_btn">
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#accessoriesSalesModal">
      <i class="bi bi-plus"></i> Penjualan</a>
    </button>
    @include('simulation-of-accessories-sales.create')
  </x-slot>
  <x-slot name="content_page">
    <div class="row d-flex justify-content-between">
      <div class="col-9 align-items-center d-flex mb-3">
        <form id="sorting-form">
          <div class="form-check form-check-inline align-middle">
            <label class="form-check-label align-middle">Filter Berdasarkan : </label>
          </div>
          <div class="form-check form-check-inline align-middle">
            <input class="form-check-input" type="checkbox" id="sorting" value="sort">
            <label class="form-check-label align-middle" for="sorting">Urutan</label>
          </div>
        </form>
      </div>
      <div class="col-2">
        <form id="search-form">
          <div class="input-group mb-3">
            <input type="search" class="form-control rounded" placeholder="Cari" aria-label="Recipient's username" aria-describedby="button-search" id="search-input">
            {{-- <button class="btn btn-outline-secondary" type="button" id="button-search"><i class="bi bi-search"></i></button> --}}
          </div>
        </form>
      </div>
    </div>
    <table class="table table-striped table-hover text-center" id="accessories-sales-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Tgl Beli</th>
          <th>Nama Barang</th>
          <th>Warna</th>
          <th>Nama Pelanggan</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Diskon</th>
          <th>Total Harga</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </x-slot>
</x-master>
