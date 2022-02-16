<x-master>
  <x-slot name="header_page"><i class="bi bi-shop"></i> Create Outlet</x-slot>
  <x-slot name="header_btn">
    <a href="{{ route('outlet.index') }}" class="btn btn-sm btn-primary"><i class="bi bi-arrow-return-left"></i> Return Back</a>
  </x-slot>
  <x-slot name="content_page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Create New Outlet</div>
              <div class="card-body">
                <form action="{{ route('outlet.store') }}" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Adress</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="num" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Create</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-master>
