<x-auth>
  <x-slot name="card_header">Register</x-slot>
  <x-slot name="card_body">
    <form action="{{ route('register') }}" method="post">
      @csrf
      <div class="mb-2">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Nama Lengkap">
        @error('name')
          <div class="text-danger mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Username">
        @error('username')
          <div class="text-danger mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Alamat Email">
        @error('email')
          <div class="text-danger mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="type" class="form-label">Hak Akses</label>
        <select class="form-select form-select mb-3" aria-label=".form-select example" name="role" value="{{ old('role') }}">
          <option selected disabled>-- Pilih Hak Akses --</option>
          <option value="admin">Admin</option>
          <option value="cashier">Kasir</option>
          <option value="owner">Owner</option>
        </select>
        @error('role')
          <div class="text-danger mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select form-select mb-3" aria-label=".form-select example" name="gender">
          <option selected>-- Pilih Gender --</option>
          <option value="L">Laki-Laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>
      @error('gender')
        <div class="text-danger mt-2">
          {{ $message }}
        </div>
      @enderror
      <div class="mb-2">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
        @error('password')
          <div class="text-danger mt-2">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-4 d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-primary">Daftar</button>
        <div id="emailHelp" class="form-text">Sudah Daftar?
          <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
        </div>
      </div>
    </form>
  </x-slot>
</x-auth>
