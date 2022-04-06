<div class="collapse" id="formLaundry">
  <!-- Member -->
    <div class="row mt-4">
        <div class="col-6">
        <div class="mb-3">
            <label for="transaction_date" class="form-label">Tanggal Transaksi</label>
            <input type="date" name="transaction_date" id="transaction_date" value="{{ date('Y-m-d') }}" class="form-control">
        </div>
        </div>
        <div class="col-6">
        <div class="mb-3">
            <label for="estimation_complete" class="form-label">Estimasi Selesai</label>
            <input type="date" name="estimation_complete" id="estimation_complete" value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}" class="form-control">
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
        <div class="mb-3">
            <label for="transaction_date" class="form-label">
            <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#transactionMemberModal">
                <i class="bi bi-plus"></i>
            </button>
            Nama Pelanggan / Gender :
            </label>
            <label for="member_name" class="form-label" id="member_name"></label>
        </div>
        </div>
        <div class="col-6">
        <div class="mb-3">
            <label class="form-label">Alamat Pelanggan / No. Telp : </label>
            <label for="member_address" class="form-label" id="member_address"></label>
        </div>
        </div>
    </div>
  <!-- /Member -->

  <!-- Package -->
    <div class="row">
        <table id="transaction-table" class="table table-stripped table-hover text-center">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Nama Paket</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp

              @foreach ($members as $member)
                  <tr>
                      <td class="align-middle" colspan="5">No data available in table</td>
                  </tr>
              @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total Bayar</td>
                    <td>
                        <span id="subTotal">0</span>
                    </td>
                    <td rowspan="4">
                        <label for="payment">Pembayaran</label>
                        <input type="text" class="form-control" name="payment" id="payment" value="0">
                        <div>
                            <button class="btn btn-sm btn-primary">Bayar</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Diskon</td>
                    <td>
                        <input type="number" name="discount" id="discount" value="0">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Pajak
                        <input type="number" name="tax" class="tax" id="tax" value="0" min="0">
                    </td>
                    <td>
                        <span id="tax">0</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Total Akhir</td>
                    <td>
                        <span id="total">0</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
  <!-- /Package -->

  <!-- Payment -->
    {{-- <div class="card">
      <div class="card-body"></div>
    </div> --}}
  <!-- /Payment -->

  <!-- Member Modal -->
  <div class="modal fade" id="transactionMemberModal" tabindex="-1" aria-labelledby="transactionMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transactionMemberModalLabel"><i class="bi bi-person-plus-fill"></i> Pilih Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table id="transaction-member-table" class="table table-striped table-hover">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pelanggan</th>
                    <th>Gender</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Pilih</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($members as $member)
                    <tr>
                        <td class="align-middle">
                            {{ $no++ }}
                            <input type="hidden" name="member_id" class="member-id" id="memberId" value="{{ $member->id }}">
                        </td>
                        <td class="align-middle">{{ $member->name }}</td>
                        <td class="align-middle">{{ $member->gender }}</td>
                        <td class="align-middle">{{ $member->phone }}</td>
                        <td class="align-middle">{{ $member->address }}</td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-sm choose-member-btn"><i class="bi bi-check2-square"></i></button>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /Member Modal -->
</div>
