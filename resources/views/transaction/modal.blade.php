<div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="packageModalLabel"><i class="bi bi-box-seam"></i> Pilih Paket</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table id="transaction-package-table" class="table table-striped table-hover">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Pilih</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($packages as $package)
                    <tr>
                        <td class="align-middle">
                            {{ $no++ }}
                            <input type="hidden" name="package_id" class="package-id" id="packageId" value="{{ $package->id }}">
                        </td>
                        <td class="align-middle">{{ $package->package_name }}</td>
                        <td class="align-middle">{{ $package->price }}</td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-sm choose-package-btn"><i class="bi bi-check2-square"></i></button>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
