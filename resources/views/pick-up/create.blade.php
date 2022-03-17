<!-- Modal -->
<div class="modal fade" id="pickupModal" tabindex="-1" aria-labelledby="pickupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pickupModalLabel"><i class="bi bi-send"></i> Create Pickup </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
                <div class="card-header"><i class="bi bi-plus"></i> Pickup</div>
                <div class="card-body">
                  <form action="{{ route('pickup.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Pelanggan</label>
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
                      @error('name')
                        <span class="invalid-feedback">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Alamat</label>
                      <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
                      @error('address')
                        <span class="invalid-feedback">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">No. Telpon</label>
                      <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                      @error('phone')
                        <span class="invalid-feedback">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="petugas_jemput" class="form-label">Petugas Jemput</label>
                      <input type="text" name="pickup_officer" value="{{ old('petugas_jemput') }}" class="form-control @error('petugas_jemput') is-invalid @enderror">
                      @error('petugas_jemput')
                        <span class="invalid-feedback">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-select mb-3" aria-label=".form-select example" name="status">
                          <option value="Tercatat" selected>Tercatat</option>
                          <option value="Penjemputan">Penjemputan</option>
                          <option value="Selesai">Selesai</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Create</button>
                  </form>
                </div>
              </div>
      </div>
    </div>
  </div>
