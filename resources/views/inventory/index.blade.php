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
    <x-slot name="header_page"><i class="bi bi-people-fill"></i>Tabel Inventaris</x-slot>
    <x-slot name="header_btn">
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#inventoryModal">
            <i class="bi bi-plus"></i> Add Inventory</a>
        </button>
        @include('inventory.create')
    </x-slot>
    <x-slot name="content_page">
        <table class="table table-bordered text-center" id="inventory-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Merk Barang</th>
                    <th>Qty</th>
                    <th>Kondisi</th>
                    <th>Tgl Pengadaan</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($inventories as $inventory)
                    @include('inventory.edit')
                    <tr>
                        <td class="align-middle">{{ $no++ }}</td>
                        <td class="align-middle">{{ $inventory->nama_barang }}</td>
                        <td class="align-middle">{{ $inventory->merk_barang }}</td>
                        <td class="align-middle">{{ $inventory->qty }}</td>
                        <td class="align-middle">{{ $inventory->kondisi }}</td>
                        <td class="align-middle">{{ $inventory->tanggal_pengadaan }}</td>
                        <td class="align-middle">{{ $inventory->created_at }}</td>
                        <td class="align-middle">{{ $inventory->updated_at }}</td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#editInventoryModal{{ $inventory->id }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteInventoryModal{{ $inventory->id }}">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @include('inventory.delete')
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-master>
