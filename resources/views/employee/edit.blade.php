<!-- Modal -->
<div class="modal fade" id="editEmployeeModal{{ $employee->id }}" tabindex="-1" aria-labelledby="editEmployeeModalLabel{{ $employee->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editEmployeeModalLabel{{ $employee->id }}"><i class="bi bi-person-check-fill"></i> Edit employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header">Edit Employee</div>
          <div class="card-body">
            <form action="{{ route('employee.update', $employee->id) }}" method="post">
              @csrf
              @method('put')
              <div class="mb-3">
              <label for="type" class="form-label">Outlet</label>
                <select class="form-select form-select mb-3" aria-label=".form-select example" name="outlet_id">
                  <option selected disabled>-- Select Outlet --</option>
                  @foreach ($outlets as $outlet)
                      @if ($outlet->id === $employee->outlet_id)
                        <option value="{{ $outlet->id }}" selected>{{ $outlet->name }}</option>
                      @else
                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                      @endif
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="type" class="form-label">Role</label>
                <select class="form-select form-select mb-3" aria-label=".form-select example" name="role" value="{{ old('role') }}">
                  @if (isset($employee->role))
                      <option value="{{ $employee->role }}" selected>{{ $employee->role }}</option>
                    @endif
                  <option value="admin">Admin</option>
                  <option value="cashier">Cashier</option>
                  <option value="owner">Owner</option>
                </select>
                @error('role')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select form-select mb-3" aria-label=".form-select example" name="gender">
                    @if (isset($employee->gender))
                      <option value="{{ $employee->gender }}" selected>{{ $employee->gender }}</option>
                    @endif
                    <option value="L">L</option>
                    <option value="P">P</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" value="{{ old('username', $employee->username) }}" class="form-control" id="username" placeholder="Username">
                  @error('username')
                    <div class="text-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" name="email" value="{{ old('email', $employee->email) }}" class="form-control" id="email" placeholder="Email Address">
                  @error('email')
                    <div class="text-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" value="{{ old('name', $employee->name) }}" class="form-control" id="name" placeholder="Name">
                  @error('name')
                    <div class="text-danger mt-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
              </form>
          </div>
        </div>
    </div>
  </div>
</div>
