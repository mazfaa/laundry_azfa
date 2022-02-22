<!-- Modal -->
<div class="modal fade" id="deletePackageModal{{ $package->id }}" tabindex="-1" aria-labelledby="deletePackageModalLabel{{ $package->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletePackageModalLabel{{ $package->id }}"><i class="bi bi-trash"></i> Delete Package</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus record data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <form action="{{ route('package.destroy', $package->id) }}" method="post" class="d-inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
