<x-master>
    <x-slot name="status">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @elseif (session('deleted'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleted') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
    </x-slot>
    <x-slot name="header_page"><i class="bi bi-people-fill"></i>Tabel Member</x-slot>
    <x-slot name="header_btn">
      <a href="{{ route('member.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Member</a>
    </x-slot>
    <x-slot name="content_page">
      <table class="table table-bordered text-center" id="member-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Member Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Settings</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($members as $member)
          <tr>
            <td class="align-middle">{{ $no++; }}</td>
            <td class="align-middle">{{ $member->name }}</td>
            <td class="align-middle">{{ $member->address }}</td>
            <td class="align-middle">{{ $member->gender }}</td>
            <td class="align-middle">{{ $member->phone }}</td>
            <td class="align-middle">{{ $member->created_at }}</td>
            <td class="align-middle">{{ $member->updated_at }}</td>
            <td class="align-middle">
                <div class="d-flex">
                    <a href="{{ route('member.show', $member->id) }}" class="btn btn-sm btn-primary d-flex gap-1"><i class="bi bi-eye"></i> Show</a>
                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-success d-flex gap-1"><i class="bi bi-pencil-square"></i> Edit</a>
                    <form action="{{ route('member.destroy', $member->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger d-flex gap-1"><i class="bi bi-trash"></i> Delete</button>
                    </form>
                </div>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </x-slot>
  </x-master>
