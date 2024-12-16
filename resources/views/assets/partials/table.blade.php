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
                        <i class="btn fas fa-edit editAssetBtn" data-toggle="modal" data-target="#editModal-{{ $asset->id }}" data-id="{{ $asset->id }}" data-asalid="{{$asset->asal_id}}"></i>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Kode Barang:</strong> {{ $asset->kode_barang }}</p>
                                    <p><strong>Nama Barang:</strong> {{ $asset->nama_barang }}</p>
                                    <p><strong>No Register:</strong> {{ $asset->no_register }}</p>
                                    <p><strong>Merk:</strong> {{ $asset->merk }}</p>
                                    <p><strong>Bahan:</strong> {{ $asset->bahan }}</p>
                                    <p><strong>Tahun Pembelian:</strong> {{ $asset->thn_pembelian }}</p>
                                    <p><strong>Pabrik:</strong> {{ $asset->pabrik }}</p>
                                    <p><strong>Rangka:</strong> {{ $asset->rangka }}</p>

                                </div>
                                <div class="col-md-6">
                                    <p><strong>mesin:</strong> {{ $asset->mesin }}</p>
                                    <p><strong>polisi:</strong> {{ $asset->polisi }}</p>
                                    <p><strong>bpkb:</strong> {{ $asset->bpkb }}</p>
                                    <p><strong>asal:</strong> {{ $asset->asal_id }}</p>
                                    <p><strong>Harga:</strong> {{ $asset->harga }}</p>
                                    <p><strong>Deskripsi Barang:</strong> {{ $asset->deskripsi_brg }}</p>
                                    <p><strong>Keterangan:</strong> {{ $asset->keterangan }}</p>
                                    <p><strong>OPD:</strong> {{ $asset->opd }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal-{{ $asset->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editModalLabel-{{ $asset->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" id="nama_barang-{{ $asset->id }}"
                                                name="nama_barang" class="form-control"
                                                value="{{ $asset->nama_barang }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input type="text" id="kode_barang-{{ $asset->id }}"
                                                name="kode_barang" class="form-control"
                                                value="{{ $asset->kode_barang }}">
                                        </div>
                                        <div class="form-group">
                                            <label>No Register</label>
                                            <input type="text" id="no_register-{{ $asset->id }}"
                                                name="no_register" class="form-control"
                                                value="{{ $asset->no_register }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Merk</label>
                                            <input type="text" id="merk-{{ $asset->id }}" name="merk"
                                                class="form-control" value="{{ $asset->merk }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan</label>
                                            <input type="text" id="bahan-{{ $asset->id }}" name="bahan"
                                                class="form-control" value="{{ $asset->bahan }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pembelian</label>
                                            <input type="text" id="thn_pembelian-{{ $asset->id }}"
                                                name="thn_pembelian" class="form-control"
                                                value="{{ $asset->thn_pembelian }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Pabrik</label>
                                            <input type="text" id="pabrik-{{ $asset->id }}" name="pabrik"
                                                class="form-control" value="{{ $asset->pabrik }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Rangka</label>
                                            <input type="text" id="rangka-{{ $asset->id }}" name="rangka"
                                                class="form-control" value="{{ $asset->rangka }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mesin</label>
                                            <input type="text" id="mesin-{{ $asset->id }}" name="mesin"
                                                class="form-control" value="{{ $asset->mesin }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Polisi</label>
                                            <input type="text" id="polisi-{{ $asset->id }}" name="polisi"
                                                class="form-control" value="{{ $asset->polisi }}">
                                        </div>
                                        <div class="form-group">
                                            <label>BPKB</label>
                                            <input type="text" id="bpkb-{{ $asset->id }}" name="bpkb"
                                                class="form-control" value="{{ $asset->bpkb }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Asal</label>
                                            <select name="asal_id" id="asal_id-{{ $asset->id }}" class="form-control">
                                                {{-- <option value="">Pilih Asal</option> --}}
                                                <!-- Dropdown akan dipopulasi melalui AJAX -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" id="harga-{{ $asset->id }}" name="harga"
                                                class="form-control" value="{{ $asset->harga }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Barang</label>
                                            <input type="text" id="deskripsi_brg-{{ $asset->id }}"
                                                name="deskripsi_brg" class="form-control"
                                                value="{{ $asset->deskripsi_brg }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" id="keterangan-{{ $asset->id }}"
                                                name="keterangan" class="form-control"
                                                value="{{ $asset->keterangan }}">
                                        </div>
                                        <div class="form-group">
                                            <label>OPD</label>
                                            <input type="text" id="opd-{{ $asset->id }}" name="opd"
                                                class="form-control" value="{{ $asset->opd }} " readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning updateAssetBtn"
                                    data-id="{{ $asset->id }}" data-asalid="{{$asset->asal_id}}">Update</button>
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
