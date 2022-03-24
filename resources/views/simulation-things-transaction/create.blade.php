<!-- Modal -->
<div class="modal fade" id="simulationThingsModal" tabindex="-1" aria-labelledby="simulationThingsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="simulationThingsModalLabel"><i class="bi bi-person-plus-fill"></i> Create Barang Transaksi </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header">Create Barang Transaksi</div>
          <div class="card-body">
            <form id="things-form">
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
                  <label for="gender" class="form-label">Nama Barang</label>
                  <select class="form-select form-select mb-3" aria-label=".form-select example" name="things" id="things-list">
                    <option selected>-- Pilih Barang --</option>
                    <option value="Pewangi">Pewangi</option>
                    <option value="Detergent">Detergent</option>
                    <option value="Detergent_Sepatu">Detergent Sepatu</option>
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
                <label for="tgl_beli" class="form-label">Tgl Beli</label>
                <input type="date" id="start-work" name="tgl_beli" value="{{ old('tgl_beli') }}" class="form-control @error('tgl_beli') is-invalid @enderror">
                @error('tgl_beli')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Harga Barang</label>
                <input type="number" name="price" value="{{ old('price', 0) }}" class="form-control @error('price') is-invalid @enderror" id="thingsPrice" readonly>
                @error('price')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pay_type" id="cash" value="Cash">
                  <label class="form-check-label" for="cash">Cash</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pay_type" id="transfer" value="Transfer">
                  <label class="form-check-label" for="transfer">e-money/transfer</label>
                </div>
                @error('jumlah_anak')
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