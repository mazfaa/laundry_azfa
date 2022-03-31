<!-- Modal -->
<div class="modal fade" id="deleteAbsenteeismModal{{ $employee->id }}" tabindex="-1"
  aria-labelledby="deleteAbsenteeismModalLabel{{ $employee->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteAbsenteeismModalLabel{{ $employee->id }}"><i
                      class="bi bi-trash"></i> Delete employees</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Anda yakin ingin menghapus record data ini?
          </div>
          <div class="modal-footer">
              <form action="{{ route('absenteeism.destroy', $employee->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
              </form>
          </div>
      </div>
  </div>
</div>
