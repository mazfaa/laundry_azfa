<x-auth>
    <x-slot name="card_header">Register</x-slot>
    <x-slot name="card_body">
        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="mb-2">
            <label for="type" class="form-label">Role</label>
            <select class="form-select form-select mb-3" aria-label=".form-select example" name="role" value="{{ old('role') }}">
              <option selected disabled>-- Select Role --</option>
              <option value="admin">Admin</option>
              <option value="cashier">Cashier</option>
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
                <option selected>-- Select Gender --</option>
                <option value="L">L</option>
                <option value="P">P</option>
              </select>
            </div>
            @error('gender')
              <div class="text-danger mt-2">
                {{ $message }}
              </div>
            @enderror
            <div class="mb-2">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username">
                @error('username')
                    <div class="text-danger mt-2">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                @error('email')
                    <div class="text-danger mt-2">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <div class="mb-2">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
              @error('name')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputPassword1">
              @error('password')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-4">
                <div id="emailHelp" class="form-text">Alreadry register?
                    <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
    </x-slot>
</x-auth>
