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
    <x-slot name="header_page"><i class="bi bi-people-fill"></i> Gaji Karyawan</x-slot>
    <x-slot name="header_btn">
      <a href="{{ route('export-salary') }}" class="btn btn-sm btn-success">
        <i class="bi bi-file-earmark-excel"></i> Export</a>
      </a>

      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#karyawanModal">
        <i class="bi bi-plus"></i> Karyawan</a>
      </button>
    @include('employee_salary.create')
    </x-slot>
    <x-slot name="content_page">
      <table class="table table-striped table-hover text-center" id="karyawan-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Jumlah Anak</th>
            <th>Mulai Bekerja</th>
            <th>Gaji Awal</th>
            <th>Tunjangan</th>
            <th>Total Gaji</th>
            <th>Settings</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
        </tbody>
      </table>
    </x-slot>
  </x-master>
