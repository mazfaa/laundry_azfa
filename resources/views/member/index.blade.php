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
      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#memberModal">
      <i class="bi bi-plus"></i> Member</a>
    </button>
    @include('member.create')
    </x-slot>
    <x-slot name="content_page">
      <table class="table table-bordered text-center" id="member-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>No. Telp</th>
            <th>Settings</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($members as $member)
          @include('member.edit')
          <tr>
            <td class="align-middle">{{ $no++; }}</td>
            <td class="align-middle">{{ $member->name }}</td>
            <td class="align-middle">{{ $member->address }}</td>
            <td class="align-middle">
              <span class="badge bg-primary">{{ $member->gender }}</span>
            </td>
            <td class="align-middle">{{ $member->phone }}</td>
            <td class="align-middle">
              <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editMemberModal{{ $member->id }}">
              <i class="bi bi-pencil-square"></i> Edit
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMemberModal{{ $member->id }}">
              <i class="bi bi-trash"></i> Delete
            </button>
            </td>
          </tr>
          @include('member.delete')
          @endforeach
        </tbody>
      </table>
    </x-slot>
  </x-master>
