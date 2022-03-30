<!-- Modal -->
<div class="modal fade" id="accessoriesSalesModal" tabindex="-1" aria-labelledby="accessoriesSalesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accessoriesSalesModalLabel"><i class="bi bi-activity"></i> Create Penjualan Aksesoris </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header">Create Penjualan Aksesoris</div>
          <div class="card-body">
            <form id="accessories-form">
              @csrf
              <div class="mb-3">
                <label for="id" class="form-label">#</label>
                <input type="number" name="id" value="{{ old('id') }}" class="form-control @error('id') is-invalid @enderror" id="id">
                @error('id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="tgl_beli" class="form-label">Tgl Beli</label>
                <input type="date" id="tgl-beli" name="tgl_beli" value="{{ old('tgl_beli') }}" class="form-control @error('tgl_beli') is-invalid @enderror">
                @error('tgl_beli')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="gender" class="form-label">Nama Barang</label>
                  <select class="form-select form-select mb-3" aria-label=".form-select example" name="accessories" id="accessories-list">
                    <option selected>-- Pilih Aksesoris --</option>
                    <option value="Gantungan Kunci">Gantungan Kunci</option>
                    <option value="Ikat Rambut">Ikat Rambut</option>
                  </select>
              </div>
              <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input type="number" name="jumlah" value="{{ old('jumlah', 0) }}" class="form-control @error('jumlah') is-invalid @enderror" id="amountThings">
                  @error('jumlah')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Harga Barang</label>
                <input type="number" name="price" value="{{ old('price', 0) }}" class="form-control @error('price') is-invalid @enderror" id="accessoriesPrice" readonly>
                @error('price')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">Warna</label>
                <input type="text" name="color" value="{{ old('color') }}" class="form-control @error('color') is-invalid @enderror" id="color">
                @error('color')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="customer" class="form-label">Nama Pelanggan</label>
                <input type="text" name="customer" value="{{ old('customer') }}" class="form-control @error('customer') is-invalid @enderror" id="customer">
                @error('customer')
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