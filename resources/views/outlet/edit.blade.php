<!-- Modal -->
<div class="modal fade" id="editOutletModal{{ $outlet->id }}" tabindex="-1" aria-labelledby="editOutletModalLabel{{ $outlet->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editOutletModalLabel{{ $outlet->id }}"><i class="bi bi-shop"></i> Edit Outlet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header"><i class="bi bi-pencil-square"></i> Update Outlet</div>
          <div class="card-body">
            <form action="{{ route('outlet.update', $outlet->id) }}" method="post">
              @csrf
              @method('put')
              <div class="mb-3">
                <label for="name" class="form-label">Nama Outlet</label>
                <input type="text" name="name" value="{{ old('name', $outlet->name) }}" class="form-control @error('name') is-invalid @enderror" id="name">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" name="address" value="{{ old('address', $outlet->address) }}" class="form-control @error('address') is-invalid @enderror" id="address">
                @error('address')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">No. Telp</label>
                <input type="text" name="phone" value="{{ old('phone', $outlet->phone) }}" class="form-control @error('phone') is-invalid @enderror" id="phone">
                @error('phone')
                  <span class="invalid-feedback">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
