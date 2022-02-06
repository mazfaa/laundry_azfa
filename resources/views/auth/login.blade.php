<x-auth>
    @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
      @endif
    <x-slot name="card_header">Login</x-slot>
    <x-slot name="card_body">
        <form>
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="mb-4">
                <div id="emailHelp" class="form-text">Not registered yet?
                    <a href="{{ route('register') }}" class="text-decoration-none">Create Account.</a>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
    </x-slot>
</x-auth>
