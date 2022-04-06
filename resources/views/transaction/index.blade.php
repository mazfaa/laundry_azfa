<x-master>
  <x-slot name="header_page"><i class="bi bi-credit-card-fill"></i> Transaksi</x-slot>
  <x-slot name="header_btn">
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#packageModal">
        <i class="bi bi-plus"></i> Cucian</a>
    </button>
    @include('transaction.modal')
  </x-slot>
  <x-slot name="content_page">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="collapse" aria-current="page" href="#dataLaundry" id="nav-data" role="button" aria-expanded="false" aria-controls="dataLaundry">Data Laundry</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" aria-current="page" href="#formLaundry" id="nav-form" role="button" aria-expanded="false" aria-controls="formLaundry">Cucian Baru</a>
      </li>
    </ul>

    <form action="{{ route('transaction.store') }}" method="post">
        @include('transaction.form')
        @include('transaction.data')
    </form>
  </x-slot>
</x-master>
