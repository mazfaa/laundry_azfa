<!-- Modal -->
<div class="modal fade" id="outletModal" tabindex="-1" aria-labelledby="outletModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="outletModalLabel"><i class="bi bi-shop"></i> Create Outlet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
            <div class="card-header"><i class="bi bi-plus"></i> Outlet</div>
            <div class="card-body">
              <form action="{{ route('outlet.store') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Outlet</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
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
                  <label for="phone" class="form-label">No. Telp</label>
                  <input type="num" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                  @error('phone')
                    <span class="invalid-feedback">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Create</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>