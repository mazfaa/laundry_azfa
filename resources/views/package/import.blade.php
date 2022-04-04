<!-- Modal -->
<div class="modal fade" id="importPackageModal" tabindex="-1"
  aria-labelledby="importPackageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="importPackageModalLabel"><i class="bi bi-file-earmark-excel"></i> Import Package</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('package.import') }}" method="post" enctype="multipart/form-data" class="d-inline">
            <div class="modal-body">
                @csrf
                <input type="file" name="file" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-bar-down"></i> Import</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
          </form>
      </div>
  </div>
</div>
