<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>BPKB</th>
            <th>Polisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($assets as $asset)
            <tr>
                <td>{{ $asset->kode_barang }}</td>
                <td>{{ $asset->nama_barang }}</td>
                <td>{{ $asset->merk }}</td>
                <td>{{ $asset->bpkb }}</td>
                <td>{{ $asset->polisi }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <i class="btn far fa-eye" data-toggle="modal" data-target="#detailModal-{{ $asset->id }}"></i>
                        <i class="btn fas fa-edit" data-toggle="modal" data-target="#editModal-{{ $asset->id }}"></i>
                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST"
                            onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn fas fa-trash-alt"></button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- Modal Detail -->
            <div class="modal fade" id="detailModal-{{ $asset->id }}" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail <strong>{{ $asset->nama_barang }}</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Kode Barang:</strong> {{ $asset->kode_barang }}</p>
                            <p><strong>Nama Barang:</strong> {{ $asset->nama_barang }}</p>
                            <p><strong>Merk:</strong> {{ $asset->merk }}</p>
                            <p><strong>BPKB:</strong> {{ $asset->bpkb }}</p>
                            <p><strong>Polisi:</strong> {{ $asset->polisi }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal-{{ $asset->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel-{{ $asset->id }}" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel-{{ $asset->id }}">Edit Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAssetForm-{{ $asset->id }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" id="nama_barang-{{ $asset->id }}" name="nama_barang" class="form-control"
                            value="{{ $asset->nama_barang }}" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" id="kode_barang-{{ $asset->id }}" name="kode_barang" class="form-control"
                            value="{{ $asset->kode_barang }}" required>
                    </div>
                    {{-- <div class="form-group">
                        <label>No BA Terima</label>
                        <input type="text" id="no_ba_terima-{{ $asset->id }}" name="no_ba_terima" class="form-control"
                            value="{{ $asset->no_ba_terima }}">
                    </div>
                    <div class="form-group">
                        <label>Tgl BA Terima</label>
                        <input type="date" id="tgl_ba_terima-{{ $asset->id }}" name="tgl_ba_terima" class="form-control"
                            value="{{ $asset->tgl_ba_terima }}">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-warning updateAssetBtn" data-id="{{ $asset->id }}">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

        @empty
            <tr>
                <td colspan="6" class="text-center">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div>
    {{ $assets->links() }}
</div>
