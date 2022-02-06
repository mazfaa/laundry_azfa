<x-master>
  <x-slot name="header_page">Edit Member</x-slot>
  <x-slot name="header_btn">
    <a href="{{ route('member.index') }}" class="btn btn-sm btn-primary"><i class="bi bi-arrow-return-left"></i> Return Back</a>
  </x-slot>
  <x-slot name="content_page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Edit New Member</div>
              <div class="card-body">
                <form action="{{ route('member.update', $member->id) }}" method="post">
                  @csrf
                  @method('put')
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $member->name) }}" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Adress</label>
                    <input type="text" name="address" value="{{ old('address', $member->address) }}" class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="gender" class="form-label">Gender</label>
                      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="gender">
                        @if (isset($member->gender))
                          <option value="{{ $member->gender }}" selected>{{ $member->gender }}</option>
                        @endif
                        <option value="L">L</option>
                        <option value="P">P</option>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="num" name="phone" value="{{ old('phone', $member->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Edit</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-master>
