<!-- Modal -->
<div class="modal fade" id="inventoryModal" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inventoryModalLabel"><i class="bi bi-person-plus-fill"></i> Create
                    Inventory </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">Create New Inventory</div>
                    <div class="card-body">
                        <form action="{{ route('inventory.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}"
                                    class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang">
                                @error('nama_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="merk_barang" class="form-label">Merk Barang</label>
                                <input type="text" name="merk_barang" value="{{ old('merk_barang') }}"
                                    class="form-control @error('merk_barang') is-invalid @enderror">
                                @error('merk_barang')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
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
                                <label for="kondisi" class="form-label">kondisi</label>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                    name="kondisi">
                                    <option selected>-- Select Kondisi --</option>
                                    <option value="layak_pakai">layak_pakai</option>
                                    <option value="rusak_ringan">rusak_ringan</option>
                                    <option value="rusak_baru">rusak_baru</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pengadaan" class="form-label">Tanggal Pengadaan</label>
                                <input type="date" name="tanggal_pengadaan" id="tanggal_pengadaan"
                                    value="{{ old('tanggal_pengadaan') }}"
                                    class="form-control @error('tanggal_pengadaan') is-invalid @enderror">
                                @error('tanggal_pengadaan')
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
