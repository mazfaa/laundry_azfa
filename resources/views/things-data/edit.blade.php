<!-- Modal -->
<div class="modal fade" id="editThingsDataModal{{ $thing->id }}" tabindex="-1"
  aria-labelledby="editThingsDataModalLabel{{ $thing->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editThingsDataModalLabel{{ $thing->id }}"><i class="bi bi-box-seam"></i> Edit Barang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="card">
                  <div class="card-header"><i class="bi bi-pencil-square"></i> Edit Barang</div>
                  <div class="card-body">
                      <form action="{{ route('things_data.update', $thing->id) }}" method="post">
                          @csrf
                          @method('put')
                          <div class="mb-3">
                              <label for="things_data" class="form-label">Nama Barang</label>
                              <input type="text" name="things_data"
                                  value="{{ old('things_data', $thing->things_name) }}"
                                  class="form-control @error('things_data') is-invalid @enderror" id="things_data">
                              @error('things_data')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="text" name="qty" value="{{ old('qty', $thing->qty) }}"
                                class="form-control @error('qty') is-invalid @enderror">
                            @error('qty')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" name="price" value="{{ old('price', $thing->price) }}"
                                class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="pay_date" class="form-label">Waktu Beli</label>
                            <input type="date" name="pay_date" id="pay_date"
                                value="{{ old('pay_date', $thing->pay_date) }}"
                                class="form-control @error('pay_date') is-invalid @enderror">
                            @error('pay_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                          <div class="mb-3">
                              <label for="supplieru" class="form-label">Supplier</label>
                              <input type="text" name="supplieru"
                                  value="{{ old('supplieru', $thing->supplier) }}"
                                  class="form-control @error('supplieru') is-invalid @enderror">
                              @error('supplieru')
                                  <span class="invalid-feedback">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <div class="mb-3">
                              <label for="things_status" class="form-label">Status Barang</label>
                              <select class="form-select form-select mb-3" aria-label=".form-select example"
                                  name="things_status">
                                  @if (isset($thing->things_status))
                                      <option value="{{ $thing->things_status }}" selected>
                                          {{ $thing->things_status }}</option>
                                  @endif
                                  <option value="Diajukan">Diajukan</option>
                                  <option value="Tersedia">Tersedia</option>
                                  <option value="Habis">Habis</option>
                              </select>
                          </div>
                          <div class="mb-3">
                              <label for="updated_status_date" class="form-label">Waktu Update Status</label>
                              <input type="date" name="updated_status_date" id="updated_status_date"
                                  value="{{ old('updated_status_date', $thing->updated_status_date) }}"
                                  class="form-control @error('updated_status_date') is-invalid @enderror">
                              @error('updated_status_date')
                                  <span class="invalid-feedback">
                                      {{ $message }}
                                  </span>
                              @enderror
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i>
                              Edit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
