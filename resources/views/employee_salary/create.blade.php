<!-- Modal -->
<div class="modal fade" id="karyawanModal" tabindex="-1" aria-labelledby="karyawanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="karyawanModalLabel"><i class="bi bi-person-plus-fill"></i> Create karyawan </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header">Create New karyawan</div>
            <div class="card-body">
              <form id="salary-form">
                @csrf
                <div class="mb-3">
                  <label for="id" class="form-label">id</label>
                  <input type="text" name="id" value="{{ old('id') }}" class="form-control @error('id') is-invalid @enderror" id="id">
                  @error('id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Karyawan</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select form-select mb-3" aria-label=".form-select example" name="gender">
                      <option selected>-- Select Gender --</option>
                      <option value="L">L</option>
                      <option value="P">P</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select form-select mb-3" aria-label=".form-select example" name="status" id="employeeStatus">
                      <option selected>-- Select Status --</option>
                      <option value="Single">Single</option>
                      <option value="Couple">Couple</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
                    <input type="number" name="jumlah_anak" value="{{ old('jumlah_anak', 0) }}" class="form-control @error('jumlah_anak') is-invalid @enderror" id="children" readonly>
                    @error('jumlah_anak')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="mulai_bekerja" class="form-label">Mulai Bekerja</label>
                    <input type="date" id="start-work" name="mulai_bekerja" value="{{ old('mulai_bekerja') }}" class="form-control @error('mulai_bekerja') is-invalid @enderror">
                    @error('mulai_bekerja')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Create</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>