<!-- Modal -->
<div class="modal fade" id="editPickupModal{{ $pickup->id }}" tabindex="-1" aria-labelledby="editPickupModalLabel{{ $pickup->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editPickupModalLabel{{ $pickup->id }}"><i class="bi bi-send"></i> Edit Pickup</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header">Update Pickup</div>
            <div class="card-body">
              <form action="{{ route('pickup.update', $pickup->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Pelanggan</label>
                  <input type="text" name="name" value="{{ old('name', $pickup->name) }}" class="form-control @error('name') is-invalid @enderror" id="name">
                  @error('name')
                    <span class="invalid-feedback">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Alamat</label>
                  <input type="text" name="address" value="{{ old('address', $pickup->address) }}" class="form-control @error('address') is-invalid @enderror">
                  @error('address')
                    <span class="invalid-feedback">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telpon</label>
                    <input type="text" name="phone" value="{{ old('phone', $pickup->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pickup_officer" class="form-label">Petugas Penjemput</label>
                    <input type="text" name="pickup_officer" value="{{ old('pickup_officer', $pickup->pickup_officer) }}" class="form-control @error('pickup_officer') is-invalid @enderror">
                    @error('pickup_officer')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                      <select class="form-select form-select mb-3" aria-label=".form-select example" name="status">
                        @if (isset($pickup->status))
                          <option value="{{ $pickup->status }}" selected>{{ $pickup->status }}</option>
                        @endif
                        <option value="Penjemputan">Penjemputan</option>
                        <option value="Selesai">Selesai</option>
                      </select>
                    </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
