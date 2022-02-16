<x-master>
    <x-slot name="header_page"><i class="bi bi-box"></i> Edit Package</x-slot>
    <x-slot name="header_btn">
      <a href="{{ route('package.index') }}" class="btn btn-sm btn-primary"><i class="bi bi-arrow-return-left"></i> Return Back</a>
    </x-slot>
    <x-slot name="content_page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">Edit New Package</div>
                <div class="card-body">
                  <form action="{{ route('package.update', $package->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                    <label for="type" class="form-label">Package Type</label>
                      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="type">
                        @if (isset($package->type))
                          <option value="{{ $package->type }}" selected>{{ $package->type }}</option>
                        @endif
                        <option value="Kiloan">Kiloan</option>
                        <option value="Selimut">Selimut</option>
                        <option value="Bed Cover">Bed Cover</option>
                        <option value="Kaos">Kaos</option>
                        <option value="Lain">Lain</option>
                      </select>
                    </div>
                    <div class="mb-3">
                    <label for="type" class="form-label">Outlet</label>
                      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="outlet_id">
                        <option selected disabled>-- Select Package Type --</option>
                        @foreach ($outlets as $outlet)
                            @if ($outlet->id === $package->outlet_id)
                              <option value="{{ $outlet->id }}" selected>{{ $outlet->name }}</option>
                            @else
                              <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="package_name" class="form-label">Package Name</label>
                      <input type="text" name="package_name" value="{{ old('package_name', $package->package_name) }}" class="form-control @error('package_name') is-invalid @enderror" id="package_name">
                      @error('package_name')
                        <span class="invalid-feedback">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text" name="price" value="{{ old('price') }} @currency($package->price)" class="form-control @error('price') is-invalid @enderror" id="rupiah">
                      @error('price')
                        <span class="invalid-feedback">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </x-slot>
  </x-master>
