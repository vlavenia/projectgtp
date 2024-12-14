@extends('layouts.app')

@section('title', 'Asset Mutasi Masuk')

@section('contents')

    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>
    <a href="" class=" btn btn-primary" data-dismiss="modal" data-target="#addmodal" data-toggle="modal">Add Asset </a>
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
                    <div class="ml-2"><a class="btn btn-info float-end" href="{{ route('exportAsset') }}">Export User
                            Data</a>
                    </div>

                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark text-center ">
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kode Lokasi</th>
                            <th>Tahun</th>
                            <th>Nilai Perolehan</th>
                            <th>Nilai Akumulasi</th>
                            <th>Merk Type</th>
                            <th>No Rangka</th>
                            <th>No BPKB</th>
                            <th>No Polisi</th>
                            <th>Luas</th>
                            <th>Penerbit</th>
                            <th>Nama Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($assets as $asset)
                            <tr>
                                <td>{{ $asset->kode_barang }}</td>
                                <td>{{ $asset->nama_barang }}</td>
                                <td>Kode Lokasi</td>
                                <td>{{ $asset->thn_pmbelian }}</td>
                                <td>Nilai Perolehan</td>
                                <td>Nilai Akumulasi</td>
                                <td>{{ $asset->merk }}</td>
                                <td>{{ $asset->rangka }}</td>
                                <td>{{ $asset->bpkb }}</td>
                                <td>{{ $asset->polisi }}</td>
                                <td>luas</td>
                                <td>penerbit</td>
                                <td>Nama Ruangan</td>

                                <td>
                                    <div class="d-flex justify-content-center">

                                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                            data-target="#editModal-{{ $asset->id }}">
                                            Edit
                                        </button>

                                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST"
                                            onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


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
                                        <form action="{{ route('assets.update', $asset->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Barang</label>
                                                    <input type="text" name="nama_barang" class="form-control"
                                                        value="{{ $asset->nama_barang }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kode Barang</label>
                                                    <input type="text" name="kode_barang" class="form-control"
                                                        value="{{ $asset->kode_barang }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>No BA Terima</label>
                                                    <input type="text" name="no_ba_terima" class="form-control"
                                                        value="{{ $asset->no_ba_terima }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tgl BA Terima</label>
                                                    <input type="date" name="tgl_ba_terima" class="form-control"
                                                        value="{{ $asset->tgl_ba_terima }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Update</button>
                                            </div>
                                        </form>
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
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Nama Barang*</label>
                                    <input type="text" name="kode_barang" class="form-control"
                                        placeholder="kode barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Nilai Total*</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah*</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Klasifikasi*</label>
                                    <input type="text" name="kode_barang" class="form-control"
                                        placeholder="kode barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Tahun pembuatan</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Satuan</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Ruangan</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Kondisi</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Asal Usul</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Keterangan</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group ">
                                    <label>Merk/Type</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Ukuran/CC</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Warna</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Bahan</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>No Pabrik</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>No Rangka</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>No Mesin</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>No Polisi</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>No BPKB</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
                                </div>
                                <div class="form-group ">
                                    <label>Upload Gambar</label>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="nama barang" required>
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
@endsection
