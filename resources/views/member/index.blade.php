<x-master>
    <x-slot name="status">
      @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
      @elseif (session('deleted'))
          <div class="alert alert-danger">
            {{ session('deleted') }}
          </div>
      @endif
    </x-slot>
    <x-slot name="header_page">Tabel Member</x-slot>
    <x-slot name="header_btn">
      <a href="{{ route('member.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i> Add Member</a>
    </x-slot>
    <x-slot name="content_page">
      <table class="table table-bordered" id="member-table">
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
            <td>{{ $no++; }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->address }}</td>
            <td>{{ $member->gender }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->created_at }}</td>
            <td>{{ $member->updated_at }}</td>
            <td>
              <a href="{{ route('member.show', $member->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Show</a>
              <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
              <form action="{{ route('member.destroy', $member->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </x-slot>
  </x-master>
