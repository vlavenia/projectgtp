@extends('layouts.app')

@section('title', 'Asset Perolehan')

@section('contents')

    <p class="mb-4">Halaman ini menampilkan data Asset terkini yang dikategorikan berdasarkan asal nya, yaitu
        APBD/DAK/DANAIS</p>
    <a href="" class=" btn btn-primary addAssetBtn" data-dismiss="modal" data-target="#addmodal" data-toggle="modal">Add
        Asset
    </a>
    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Assets</h6>
                <div class=" row mr-3">
                    <form id="searchForm" class="form-inline my-2 my-lg-0 mr-3" method="GET"
                        action="{{ route('assets.search.perolehan') }}">
                        @csrf
                        <input name="search" id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                        <div class="ml-2">
                            <a class="btn btn-secondary" href="{{ route('perolehan') }}">Reset</a>
                        </div>
                    </form>
                    <div class="ml-2"><a class="btn btn-info float-end" href="{{ route('exportAsset.perolehan') }}">Export
                            Data</a>
                    </div>

                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <tbody class="text-center">
                        @forelse ($assets as $asset)
                            <tr>
                                <td>{{ $asset->kode_barang }}</td>
                                <td>{{ $asset->nama_barang }}</td>
                                <td>{{ $asset->merk }}</td>
                                <td>{{ $asset->bpkb }}</td>
                                <td>{{ $asset->polisi }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <i class="btn far fa-eye" data-toggle="modal"
                                            data-target="#detailModal-{{ $asset->id }}"></i>
                                        <i class="btn fas fa-edit editAssetBtn" data-toggle="modal"
                                            data-target="#editModal-{{ $asset->id }}" data-id="{{ $asset->id }}"
                                            data-asalid="{{ $asset->asal_id }}" data-jenisid="{{ $asset->jenis_id }}"
                                            data-unitid="{{ $asset->unit_id }}" data-objekid="{{ $asset->objek_id }}"
                                            data-klasifikasiid="{{ $asset->klasifikasi_id }}"></i>
                                        <form action="{{ route('assets.destroy.perolehan', $asset->id) }}" method="POST"
                                            onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn fas fa-trash-alt"></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
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
                                        <form action="{{ route('assets.update.perolehan', ['id' => $asset->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf

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
                                                            <input type="text" id="merk-{{ $asset->id }}"
                                                                name="merk" class="form-control"
                                                                value="{{ $asset->merk }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bahan</label>
                                                            <input type="text" id="bahan-{{ $asset->id }}"
                                                                name="bahan" class="form-control"
                                                                value="{{ $asset->bahan }}">
                                                        </div>
                                                        <div class="form-group">
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
                                                            <input type="text" id="pabrik-{{ $asset->id }}"
                                                                name="pabrik" class="form-control"
                                                                value="{{ $asset->pabrik }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Rangka</label>
                                                            <input type="text" id="rangka-{{ $asset->id }}"
                                                                name="rangka" class="form-control"
                                                                value="{{ $asset->rangka }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mesin</label>
                                                            <input type="text" id="mesin-{{ $asset->id }}"
                                                                name="mesin" class="form-control"
                                                                value="{{ $asset->mesin }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Polisi</label>
                                                            <input type="text" id="polisi-{{ $asset->id }}"
                                                                name="polisi" class="form-control"
                                                                value="{{ $asset->polisi }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>BPKB</label>
                                                            <input type="text" id="bpkb-{{ $asset->id }}"
                                                                name="bpkb" class="form-control"
                                                                value="{{ $asset->bpkb }}">
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
                                                            <select name="klasifikasi_id"
                                                                id="klasifikasi_id-{{ $asset->id }}"
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
                                                            <input type="text" id="harga-{{ $asset->id }}"
                                                                name="harga" class="form-control"
                                                                value="{{ $asset->harga }}">
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
                                                            <input type="text" id="opd-{{ $asset->id }}"
                                                                name="opd" class="form-control"
                                                                value="{{ $asset->opd }} " readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="img_url">Gambar</label>
                                                            <input type="file" id="img_url" name="gambar"
                                                                accept="image/*" class="form-control img-upload"  data-id="{{ $asset->id }}">
                                                        </div>

                                                        <div class="mt-3 text-center">
                                                            <img id="preview-img-{{ $asset->id }}" src="{{ asset($asset->img_url) }}"
                                                                alt="Gambar Barang" class="img-fluid rounded"
                                                                style="max-height: 200px;">
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning updateAssetBtn"
                                                    data-id="{{ $asset->id }}" data-asalid="{{ $asset->asal_id }}"
                                                    data-jenisid="{{ $asset->jenis_id }}"
                                                    data-unitid="{{ $asset->unit_id }}"
                                                    data-objekid="{{ $asset->objek_id }}"
                                                    data-klasifikasiid="{{ $asset->klasifikasi_id }}">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="detailModal-{{ $asset->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail <strong>{{ $asset->nama_barang }}</strong></h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-4">
                                                <div class="col-12 text-center">
                                                    <img src="/{{ $asset->img_url }}" alt="Gambar Barang"
                                                        class="img-fluid rounded" style="max-height: 200px;">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="14">Assets not found</td>
                                </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $assets->links() }}
                </div>
            </div>
        </div>
    </div>



    <!-- Add Modal -->
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addFormmmmmm" action="{{ route('assets.store.perolehan') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Kode Barang*</label>
                                    <input type="text" name="kode_barang" class="form-control"
                                        placeholder="kode barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang*</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group">
                                    <label>No Register*</label>
                                    <input type="numeric" name="no_register" class="form-control"
                                        placeholder="No Register" required>
                                </div>
                                <div class="form-group">
                                    <label>Merk*</label>
                                    <input type="text" name="merk" class="form-control" placeholder="Merk">
                                </div>
                                <div class="form-group ">
                                    <label>Bahan*</label>
                                    <input type="text" name="bahan" class="form-control" placeholder="Bahan">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Pembelian</label>
                                    <input type="number" name="thn_pembelian" class="form-control"
                                        placeholder="Tahun Pembelian" min="1900" max="2099" step="1">
                                </div>
                                <div class="form-group ">
                                    <label>Pabrik</label>
                                    <input type="text" name="pabrik" class="form-control" placeholder="Pabrik">
                                </div>
                                <div class="form-group ">
                                    <label>Rangka</label>
                                    <input type="text" name="rangka" class="form-control" placeholder="Rangka">
                                </div>
                                <div class="form-group ">
                                    <label>mesin</label>
                                    <input type="text" name="mesin" class="form-control" placeholder="Mesin">
                                </div>
                                <div class="form-group ">
                                    <label>Polisi</label>
                                    <input type="text" name="polisi" class="form-control" placeholder="Polisi">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group ">
                                    <label>BPKB</label>
                                    <input type="text" name="bpkb" class="form-control" placeholder="BPKB">
                                </div>
                                <div class="form-group">
                                    <label for="unit_id">Unit</label>
                                    <select name="unit_id" id="unit_id" class="form-control">
                                        <option value="">-Pilih-</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}" {{-- {{ $unit->id == $asset->unit_id ? 'selected' : '' }}> --}}>
                                                {{ $unit->nama_unit }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_id_add">Jenis</label>
                                    <select name="jenis_id_add" id="jenis_id_add" class="form-control">
                                        <option>-Pilih-</option>
                                        @foreach ($jenis as $unit)
                                            <option value="{{ $unit->id }}" {{-- {{ $unit->id == $asset->unit_id ? 'selected' : '' }} --}}>
                                                {{ $unit->jenis_asset }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="objek_add_id">Objek</label>
                                    <select name="objek_id" id="objek_add_id" class="form-control">
                                        <option value="">-Pilih-</option>
                                        @foreach ($Objeks as $unit)
                                            <option value="{{ $unit->id }}" {{-- {{ $unit->id == $asset->unit_id ? 'selected' : '' }} --}}>
                                                {{ $unit->nama_objek }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="klasifikasi_id">Klasifikasi</label>
                                    <select name="klasifikasi_id" id="klasifikasi_id" class="form-control">
                                        <option value="">-Pilih-</option>
                                        @foreach ($klasifikasi as $unit)
                                            <option value="{{ $unit->id }}" {{-- {{ $unit->id == $asset->unit_id ? 'selected' : '' }} --}}>
                                                {{ $unit->nama_klasifikasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="asal_id">Asal</label>
                                    <select name="asal_id" id="asal_id" class="form-control">
                                        <option value="">-Pilih-</option>
                                        @foreach ($asals as $asal)
                                            <option value="{{ $asal->id }}" {{-- {{ $asal->id == $asset->asal_id ? 'selected' : '' }} --}}>
                                                {{ $asal->asal_asset }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control" placeholder="harga">
                                </div>
                                <div class="form-group ">
                                    <label>Deskripsi Barang</label>
                                    <input type="text" name="deskripsi_brg" class="form-control"
                                        placeholder="Deskripsi Barang">
                                </div>
                                <div class="form-group ">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control"
                                        placeholder="keterangan">
                                </div>
                                <div class="form-group ">
                                    <label>OPD</label>
                                    <input type="text" name="opd" class="form-control" placeholder="OPD">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Klasifikasi</label>
                                    <input type="date" name="klasifikasi" class="form-control"
                                        value="{{ $asset->tgl_ba_terima }}">
                                </div>
                                <div class="form-group">
                                    <label>Objek</label>
                                    <input type="date" name="klasifikasi" class="form-control"
                                        value="{{ $asset->tgl_ba_terima }}">
                                </div> --}}
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

           document.addEventListener("change", function(event) {
                if (event.target.classList.contains("img-upload")) {
                    let file = event.target.files[0];
                    let assetId = event.target.dataset.id; // Ambil ID dari atribut data-id

                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById(`preview-img-${assetId}`).src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });


            $(document).on('click', '.updateAssetBtn', function() {
                const id = $(this).data('id');
                const url = '{{ route('assets.update.perolehan', ':id') }}'.replace(':id', id);
                const data = {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    nama_barang: $(`#nama_barang-${id}`).val(),
                    kode_barang: $(`#kode_barang-${id}`).val(),
                    no_register: $(`#no_register-${id}`).val(),
                    merk: $(`#merk-${id}`).val(),
                    bahan: $(`#bahan-${id}`).val(),
                    thn_pmbelian: $(`#thn_pembelian-${id}`).val(),
                    pabrik: $(`#pabrik-${id}`).val(),
                    rangka: $(`#rangka-${id}`).val(),
                    mesin: $(`#mesin-${id}`).val(),
                    polisi: $(`#polisi-${id}`).val(),
                    bpkb: $(`#bpkb-${id}`).val(),
                    asal_id: $(`#asal_id-${id}`).val(),
                    jenis_id: $(`#jenis_id-${id}`).val(),
                    unit_id: $(`#unit_id-${id}`).val(),
                    objek_id: $(`#objek_id-${id}`).val(),
                    klasifikasi_id: $(`#klasifikasi_id-${id}`).val(),
                    harga: $(`#harga-${id}`).val(),
                    deskripsi_brg: $(`#deskripsi_brg-${id}`).val(),
                    keterangan: $(`#keterangan-${id}`).val(),
                    opd: $(`#opd-${id}`).val(),
                };
            });


        });


        $(document).on('click', '.editAssetBtn', function() {
            const assetId = $(this).data('id');
            const jenisId = $(this).data('jenisid');
            const objekId = $(this).data('objekid');
            const asalId = $(this).data('asalid');
            const unitId = $(this).data('unitid');
            const klasifikasiId = $(this).data('klasifikasiid');


            //Fungsi untuk memuat Data Jenis
            $.ajax({
                url: '{{ route('getJenis') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {

                    if (response.jenis) {
                        $(`#jenis_id-${assetId}`).empty().append(
                            '<option value="">-Pilih</option>'
                        );
                        $.each(response.jenis, function(key, jenis) {
                            console.log(jenis.id, 'jenisId:' + jenisId);
                            $(`#jenis_id-${assetId}`).append(
                                `<option ${jenisId == jenis.id ? 'selected' : ''} value="${jenis.id}">${jenis.jenis_asset}</option>`
                            );

                        });
                        loadObjekEdit(assetId, jenisId, objekId);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            $(`#jenis_id-${assetId}`).on('change', function() {
                const newJenisId = $(this).val();
                loadObjekEdit(assetId, newJenisId, null);
            });

            $.ajax({
                url: '{{ route('getAsals') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.asals) {

                        $(`#asal_id-${assetId}`).empty().append(
                            '<option value="">-Pilih</option>'
                        );
                        $.each(response.asals, function(key, asal) {
                            $(`#asal_id-${assetId}`).append(
                                `<option ${asalId == asal.id ? 'selected' : ''} value="${asal.id}">${asal.asal_asset}</option>`
                            );

                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            //Fungsi untuk memuat Data Unit
            $.ajax({
                url: '{{ route('getUnit') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.unit) {
                        $(`#unit_id-${assetId}`).empty().append(
                            '<option value="">-Pilih</option>'
                        );
                        $.each(response.unit, function(key, unit) {
                            $(`#unit_id-${assetId}`).append(
                                `<option ${unitId == unit.id ? 'selected' : ''} value="${unit.id}">${unit.nama_unit}</option>`
                            );
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            //Fungsi untuk memuat Data Klasifikasi
            $.ajax({
                url: '{{ route('getKlasifikasi') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.Klasifikasi) {
                        $(`#klasifikasi_id-${assetId}`).empty().append(
                            '<option value="">-Pilih Klasifikasi-</option>'
                        );
                        $.each(response.Klasifikasi, function(key, Klasifikasi) {
                            $(`#klasifikasi_id-${assetId}`).append(
                                `<option ${klasifikasiId == Klasifikasi.id ? 'selected' : ''} value="${Klasifikasi.id}">${Klasifikasi.nama_klasifikasi}</option>`
                            );
                        });
                    }
                },

                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });

        $(document).on('click', '.addAssetBtn', function() {
            const assetId = $(this).data('id');
            const jenisId = $(this).data('jenisid');
            const objekId = $(this).data('objekid');
            const asalId = $(this).data('asalid');
            const unitId = $(this).data('unitid');
            const klasifikasiId = $(this).data('klasifikasiid');

            console.log(jenisId);
            console.log(assetId);
            console.log(objekId);
            console.log(asalId);
            console.log(unitId);
            console.log(klasifikasiId);


            //Fungsi untuk memuat Data Jenis
            $.ajax({
                url: '{{ route('getJenis') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.jenis) {
                        $(`#jenis_id-${assetId}`).empty().append(
                            '<option value="">-Pilih</option>'
                        );
                        $.each(response.jenis, function(key, jenis) {
                            $(`#jenis_id-${assetId}`).append(
                                `<option ${jenisId == jenis.id ? 'selected' : ''} value="${jenis.id}">${jenis.jenis_asset}</option>`
                            );

                        });
                        loadObjekAdd(assetId, jenisId, objekId);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            $(`#jenis_id_add`).on('change', function() {
                const newJenisId = $(this).val();
                loadObjekAdd(assetId, newJenisId, null);

            });

            //Fungsi untuk memuat Data Asal
            $.ajax({
                url: '{{ route('getAsals') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.asals) {

                        $(`#asal_id-${assetId}`).empty().append(
                            '<option value="">-Pilih</option>'
                        );
                        $.each(response.asals, function(key, asal) {
                            $(`#asal_id-${assetId}`).append(
                                `<option ${asalId == asal.id ? 'selected' : ''} value="${asal.id}">${asal.asal_asset}</option>`
                            );

                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            //Fungsi untuk memuat Data Unit
            $.ajax({
                url: '{{ route('getUnit') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.unit) {
                        $(`#unit_id-${assetId}`).empty().append(
                            '<option value="">-Pilih</option>'
                        );
                        $.each(response.unit, function(key, unit) {
                            $(`#unit_id-${assetId}`).append(
                                `<option ${unitId == unit.id ? 'selected' : ''} value="${unit.id}">${unit.nama_unit}</option>`
                            );
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            //Fungsi untuk memuat Data Klasifikasi
            $.ajax({
                url: '{{ route('getKlasifikasi') }}',
                type: 'GET',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.Klasifikasi) {
                        $(`#klasifikasi_id-${assetId}`).empty().append(
                            '<option value="">-Pilih Klasifikasi-</option>'
                        );
                        $.each(response.Klasifikasi, function(key, Klasifikasi) {
                            $(`#klasifikasi_id-${assetId}`).append(
                                `<option ${klasifikasiId == Klasifikasi.id ? 'selected' : ''} value="${Klasifikasi.id}">${Klasifikasi.nama_klasifikasi}</option>`
                            );
                        });
                    }
                },

                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });

        // Fungsi untuk memuat Objek berdasarkan Jenis yang dipilih
        function loadObjekAdd(assetId, jenisId, objekId) {
            if (jenisId) {
                $.ajax({
                    url: '/objek/' + jenisId,
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {

                        if (data) {
                            $(`#objek_add_id`).empty().append(
                                '<option value="">-Pilih Objek-</option>');
                            $.each(data, function(key, objek) {
                                $(`#objek_add_id`).append(
                                    `<option ${objekId == objek.id ? 'selected' : ''} value="${objek.id}">${objek.nama_objek}</option>`
                                );
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('Gagal memuat data objek.');
                    }
                });
            } else {
                $(`#objek_add_id`).empty().append('<option value="">-Pilih Objek-</option>');
            }
        }

        function loadObjekEdit(assetId, jenisId, objekId) {
            let selectElement = $(`#objek_id-${assetId}`);

            if (!jenisId) {
                selectElement.empty().append('<option value="">-Silahkan pilih data jenis terlebih dahulu-</option>').prop(
                    'disabled', true);
                return;
            }

            $.ajax({
                url: '/objek/' + jenisId,
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    selectElement.empty();

                    if (data && data.length > 0) {
                        selectElement.append('<option value="">-Pilih Objek-</option>');
                        $.each(data, function(key, objek) {
                            selectElement.append(
                                `<option ${objekId == objek.id ? 'selected' : ''} value="${objek.id}">${objek.nama_objek}</option>`
                            ).prop('disabled', false);
                        });
                    } else {
                        selectElement.append('<option value="">Belum ada data</option>');
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('Gagal memuat data objek.');
                }
            });
        }
    </script>
@endsection
