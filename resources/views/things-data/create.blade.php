<!-- Modal -->
<div class="modal fade" id="thingsDataModal" tabindex="-1" aria-labelledby="thingsDataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="thingsDataModalLabel"><i class="bi bi-diagram-2-fill"></i> Create
                  Barang </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="card">
                  <div class="card-header"><i class="bi bi-plus"></i> Barang</div>
                  <div class="card-body">
                      <form action="{{ route('things_data.store') }}" method="post">
                          @csrf
                          <div class="mb-3">
                              <label for="things_name" class="form-label">Nama Barang</label>
                              <input type="text" name="things_name" value="{{ old('things_name') }}"
                                  class="form-control @error('things_name') is-invalid @enderror" id="things_name">
                              @error('things_name')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="qty" class="form-label">Qty</label>
                              <input type="number" name="qty" id="qty" value="{{ old('qty') }}"
                                  class="form-control @error('qty') is-invalid @enderror">
                              @error('qty')
                                  <span class="invalid-feedback">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="price" class="form-label">Harga</label>
                              <input type="number" name="price" id="things-data-format-number" value="{{ old('price') }}"
                                  class="form-control @error('price') is-invalid @enderror">
                              @error('price')
                                  <span class="invalid-feedback">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="pay_date" class="form-label">Waktu Beli</label>
                              <input type="date" name="pay_date" id="pay_date" value="{{ old('pay_date') }}" class="form-control @error ('pay_date') is-invalid @enderror">
                              @error('pay_date')
                                  <span class="invalid-feedback">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-3">
                            <label for="supplier" class="form-label">Supplier</label>
                            <input type="text" name="supplier" value="{{ old('supplier') }}"
                                class="form-control @error('supplier') is-invalid @enderror" id="supplier">
                            @error('supplier')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                          <div class="mb-3">
                            <label for="things_status" class="form-label">Status Barang</label>
                            <select class="form-select form-select mb-3" aria-label=".form-select example"
                                name="things_status">
                                <option selected>-- Pilih Status Barang --</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Diajukan">Diajukan</option>
                                <option value="Habis">Habis</option>
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="updated_status_date" class="form-label">Waktu Update Status</label>
                          <input type="date" name="updated_status_date" id="updated_status_date" value="{{ old('updated_status_date') }}" class="form-control @error ('updated_status_date') is-invalid @enderror">
                          @error('updated_status_date')
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
