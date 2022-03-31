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
  <x-slot name="header_page"><i class="bi bi-file-earmark-check"></i> Absensi Kerja Karyawan</x-slot>
  <x-slot name="header_btn">
    <a href="{{ route('absenteeism.export') }}" class="btn btn-sm btn-success">
      <i class="bi bi-file-earmark-excel"></i> Export</a>
    </a>

    <button type="button" class="btn btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#importAbsenteeismModal">
      <i class="bi bi-file-earmark-excel"></i> import</a>
    </button>

    @include('absenteeism.import')

    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#absenteeismModal">
      <i class="bi bi-plus"></i> Absensi</a>
    </button>

    @include('absenteeism.create')
  </x-slot>
  <x-slot name="content_page">
    <table class="table table-striped table-hover text-center" id="absenteeism-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Karyawan</th>
          <th>Tgl Masuk</th>
          <th>Waktu Masuk</th>
          <th>Status</th>
          <th>Waktu Selesai Kerja</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($employees as $employee)
          @include('absenteeism.edit')
          <tr>
            <td class="align-middle">{{ $no++ }}</td>
            <td class="align-middle">{{ $employee->employee_name }}</td>
            <td class="align-middle">{{ $employee->signin_date }}</td>
            <td class="align-middle">{{ $employee->signin_time }}</td>
            <td class="align-middle">
              <form action="{{ route('absenteeism.updateStatus') }}" method="post"> 
                @csrf
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <select class="form-select form-select-sm" aria-label=".form-select example"
                  name="status" onchange="form.submit()">
                  @if (isset($employee->status))
                      <option value="{{ $employee->status }}" selected>
                      {{ $employee->status }}</option>
                  @endif
                  <option value="Masuk">Masuk</option>
                  <option value="Cuti">Cuti</option>
                  <option value="Sakit">Sakit</option>
                </select>
              </form>  
            </td>
            <td class="align-middle">{{ $employee->time_to_finish_work }}</td>
            <td class="align-middle">
              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                  data-bs-target="#editAbsenteeismModal{{ $employee->id }}">
                  <i class="bi bi-pencil-square"></i> Edit
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                  data-bs-target="#deleteAbsenteeismModal{{ $employee->id }}">
                  <i class="bi bi-trash"></i> Delete
              </button>
            </td>
          </tr>
          @include('absenteeism.delete')
        @endforeach
      </tbody>
    </table>
  </x-slot>
</x-master>
