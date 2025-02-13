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
                        <i class="btn fas fa-edit editAssetBtn" data-toggle="modal"
                            data-target="#editModal-{{ $asset->id }}" data-id="{{ $asset->id }}"
                            data-asalid="{{ $asset->asal_id }}" data-jenisid="{{ $asset->jenis_id }}"
                            data-unitid="{{ $asset->unit_id }}" data-objekid="{{ $asset->objek_id }}"
                            data-klasifikasiid="{{ $asset->klasifikasi_id }}"></i>
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
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <img src="{{ $asset->img_url }}" alt="Gambar Barang" class="img-fluid rounded"
                                        style="max-height: 200px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Kode Barang:</strong>
                                            {{ $asset->kode_barang }}</li>
                                        <li class="list-group-item"><strong>Nama Barang:</strong>
                                            {{ $asset->nama_barang }}</li>
                                        <li class="list-group-item"><strong>No Register:</strong>
                                            {{ $asset->no_register }}</li>
                                        <li class="list-group-item"><strong>Merk:</strong>
                                            {{ $asset->merk }}</li>
                                        <li class="list-group-item"><strong>Bahan:</strong>
                                            {{ $asset->bahan }}</li>
                                        <li class="list-group-item"><strong>Tahun Pembelian:</strong>
                                            {{ $asset->thn_pmbelian }}</li>
                                        <li class="list-group-item"><strong>Pabrik:</strong>
                                            {{ $asset->pabrik }}</li>
                                        <li class="list-group-item"><strong>Rangka:</strong>
                                            {{ $asset->rangka }}</li>
                                    </ul>
                                </div>


                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Mesin:</strong>
                                            {{ $asset->mesin }}</li>
                                        <li class="list-group-item"><strong>Polisi:</strong>
                                            {{ $asset->polisi }}</li>
                                        <li class="list-group-item"><strong>BPKB:</strong>
                                            {{ $asset->bpkb }}</li>
                                        <li class="list-group-item"><strong>Asal:</strong>
                                            {{ $asset->asal->asal_asset ?? 'belum ada data asal' }}</li>
                                        <li class="list-group-item"><strong>Harga:</strong>
                                            {{ $asset->harga }}</li>
                                        <li class="list-group-item"><strong>Deskripsi Barang:</strong>
                                            {{ $asset->deskripsi_brg }}</li>
                                        <li class="list-group-item"><strong>Keterangan:</strong>
                                            {{ $asset->keterangan }}</li>
                                        <li class="list-group-item"><strong>OPD:</strong>
                                            {{ $asset->opd }}</li>
                                    </ul>
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
                                            {{-- <label>Tahun Pembelian</label>
                                            <input type="text" id="thn_pembelian-{{ $asset->id }}"
                                                name="thn_pembelian" class="form-control"
                                                value="{{ $asset->thn_pmbelian }} " > --}}
                                            <label>Tahun Pembelian</label>
                                            <input type="number" id="thn_pembelian-{{ $asset->id }}"
                                                name="thn_pmbelian" class="form-control"
                                                value="{{ $asset->thn_pmbelian }}" min="1990"
                                                max="{{ date('Y') }}"
                                                oninvalid="this.setCustomValidity('Tahun harus antara 1990 - {{ date('Y') }}')"
                                                oninput="this.setCustomValidity('')">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <select name="unit_id" id="unit_id-{{ $asset->id }}"
                                                class="form-control">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select name="jenis_id" id="jenis_id-{{ $asset->id }}"
                                                class="form-control">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Objek</label>
                                            <select name="objek_id" id="objek_id-{{ $asset->id }}"
                                                class="form-control">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Klasifikasi</label>
                                            <select name="klasifikasi_id" id="klasifikasi_id-{{ $asset->id }}"
                                                class="form-control">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Asal</label>
                                            <select name="asal_id" id="asal_id-{{ $asset->id }}"
                                                class="form-control">
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
                                        {{-- <div class="form-group">
                                            <label for="img_url-{{ $asset->id }}">Gambar</label>
                                            <input type="file" id="img_url-{{ $asset->id }}" name="gambar" accept="image/*"
                                                class="form-control">
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="img_url-{{ $asset->id }}">Gambar</label>
                                            <input type="file" id="img_url-{{ $asset->id }}" name="gambar"
                                                accept="image/*" class="form-control img-upload"
                                                data-id="{{ $asset->id }}">
                                        </div>

                                        <div class="mt-3 text-center">
                                            <img id="preview-img-{{ $asset->id }}"
                                                src="{{ asset($asset->img_url) }}" alt="Gambar Barang"
                                                class="img-fluid rounded" style="max-height: 200px;">
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning updateAssetBtn"
                                    data-id="{{ $asset->id }}" data-asalid="{{ $asset->asal_id }}"
                                    data-jenisid="{{ $asset->jenis_id }}" data-unitid="{{ $asset->unit_id }}"
                                    data-objekid="{{ $asset->objek_id }}"
                                    data-klasifikasiid="{{ $asset->klasifikasi_id }}">Update</button>
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
