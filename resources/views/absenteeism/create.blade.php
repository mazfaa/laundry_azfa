<!-- Modal -->
<div class="modal fade" id="absenteeismModal" tabindex="-1" aria-labelledby="absenteeismModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="absenteeismModalLabel"><i class="bi bi-file-earmark-check"></i> Create
                  Absensi </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="card">
                  <div class="card-header"><i class="bi bi-plus"></i> Absensi</div>
                  <div class="card-body">
                      <form action="{{ route('absenteeism.store') }}" method="post">
                          @csrf
                          <div class="mb-3">
                              <label for="employee_name" class="form-label">Nama Karyawan</label>
                              <input type="text" name="employee_name" value="{{ old('employee_name') }}"
                                  class="form-control @error('employee_name') is-invalid @enderror" id="employee_name">
                              @error('employee_name')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="signin_date" class="form-label">Waktu Masuk</label>
                              <input type="date" name="signin_date" id="signin_date" value="{{ old('signin_date') }}"
                                  class="form-control @error('signin_date') is-invalid @enderror">
                              @error('signin_date')
                                  <span class="invalid-feedback">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="signin_time" class="form-label">Waktu Masuk</label>
                              <input type="time" name="signin_time" id="things-data-format-number" value="{{ old('signin_time') }}"
                                  class="form-control @error('signin_time') is-invalid @enderror">
                              @error('signin_time')
                                  <span class="invalid-feedback">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select form-select mb-3" aria-label=".form-select example"
                                name="status">
                                <option selected>-- Status Kerja --</option>
                                <option value="Masuk">Masuk</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="time_to_finish_work" class="form-label">Waktu Selesai Kerja</label>
                            <input type="time" name="time_to_finish_work" id="things-data-format-number" value="{{ old('time_to_finish_work') }}"
                                class="form-control @error('time_to_finish_work') is-invalid @enderror" readonly>
                            @error('time_to_finish_work')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                          <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i>
                              Create</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
