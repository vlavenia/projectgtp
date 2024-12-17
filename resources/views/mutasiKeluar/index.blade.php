@extends('layouts.app')

@section('title', 'Mutasi Keluar')

@section('contents')

    <div class="mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal ">
            Tambah Mutasi Keluar
        </button>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mutasi Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('mutasikeluar.changeStatus') }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <label>Pilih Asset</label>
                                <select name="asset_id" class="form-control @error('asset_id') is-invalid @enderror">
                                    <option value="">- Pilih -</option>
                                    @foreach ($assets as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('asset_id') == $item->id ? 'selected' : null }}>
                                            {{ $item->nama_barang . '-' . $item->kode_barang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('asset_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Assets Mutasi Keluar</h6>
                <div class=" row mr-3">
                    <form id="searchForm" class="form-inline my-2 my-lg-0 mr-3" method="GET"
                        action="{{ route('assets.search.mutasiKeluar') }}">
                        @csrf
                        <input name="search" id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>
                    <div class="ml-2"><a class="btn btn-info float-end" href="{{ route('exportAsset.mutasiKeluar') }}">Export
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
                        @forelse ($asset_mutasiKeluar as $asset)
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
                                            data-asalid="{{ $asset->asal_id }}"></i>
                                        <form action="{{ route('mutasiKeluar.destroy', $asset->id) }}" method="POST"
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
                                        <form action="{{ route('mutasiKeluar.update', ['id' => $asset->id]) }}"
                                            method="POST">
                                            @csrf
                                            {{-- @method('PUT') --}}
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
                                                            <input type="text" id="thn_pembelian-{{ $asset->id }}"
                                                                name="thn_pembelian" class="form-control"
                                                                value="{{ $asset->thn_pembelian }}">
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
                                                    </div>
                                                    <div class="col-md-6">
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning updateAssetBtn"
                                                    data-id="{{ $asset->id }}"
                                                    data-asalid="{{ $asset->asal_id }}">Update</button>
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
                                                    <img src="{{ $asset->img_url }}" alt="Gambar Barang"
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
                                                            {{ $asset->thn_pembelian }}</li>
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
                                                            {{ $asset->asal_id }}</li>
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
                    {{ $asset_mutasiKeluar->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.editAssetBtn', function() {
                console.log('edit button clicked');
                const assetId = $(this).data('id');
                const asalId = $(this).data('asalid');

                $.ajax({
                    url: '{{ route('getAsals') }}',
                    type: 'GET',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.asals) {
                            console.log('+++');
                            console.log(response.asals);
                            $(`#asal_id-${assetId}`).empty().append(
                                '<option value="">-Pilih</option>'
                            );
                            $.each(response.asals, function(key, asal) {
                                $(`#asal_id-${assetId}`).append(
                                    `<option ${asalId == asal.id ? 'selected' : ''} value="${asal.id}">${asal.asal_asset}</option>`
                                );
                                console.log(asalId + "-" + JSON.stringify(asal));
                            });
                        } else {
                            console.log('Data asal tidak ditemukan');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                    }
                });
            });
        })
    </script>
@endsection
