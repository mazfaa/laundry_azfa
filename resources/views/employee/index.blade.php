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
  <x-slot name="header_page"><i class="bi bi-person-workspace"></i> Employee Table</x-slot>
  <x-slot name="content_page">
      <table class="table table-bordered text-center" id="employee-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Outlet id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Settings</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($employees as $employee)
          @include('employee.edit')
          <tr>
            <td class="align-middle">{{ $no++; }}</td>
            <td class="align-middle">{{ $employee->outlet_id; }}</td>
            <td class="align-middle">{{ $employee->name }}</td>
            <td class="align-middle">{{ $employee->username }}</td>
            <td class="align-middle">{{ $employee->email }}</td>
            <td class="align-middle">
              <span class="badge bg-primary">{{ $employee->role }}</span>
            </td>
            <td class="align-middle">{{ $employee->created_at }}</td>
            <td class="align-middle">{{ $employee->updated_at }}</td>
            <td class="align-middle">
              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editEmployeeModal{{ $employee->id }}">
              <i class="bi bi-pencil-square"></i>
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal{{ $employee->id }}">
              <i class="bi bi-trash"></i>
            </button>
            </td>
          </tr>
          @include('employee.delete')
          </tr>
          @endforeach
        </tbody>
      </table>
    </x-slot>
</x-master>