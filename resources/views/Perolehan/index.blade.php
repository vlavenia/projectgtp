@extends('layouts.app')

@section('title', 'Asset Perolehan')

@section('contents')

    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>
    <a href="" class=" btn btn-primary" data-dismiss="modal" data-target="#addmodal" data-toggle="modal">Add Asset
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
                    <form id="searchForm" class="form-inline my-2 my-lg-0  mr-3">
                        <input name="search" id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search" aria-label="Search">

                    </form>
                    <div class="ml-2"><a class="btn btn-info float-end" href="{{ route('exportAsset') }}">Export Data</a>
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
                                        <i class="btn far fa-eye" data-toggle="modal"
                                            data-target="#detailModal-{{ $asset->id }}"></i>
                                        <i class="btn fas fa-edit" data-toggle="modal"
                                            data-target="#editModal-{{ $asset->id }}"></i>
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

                            <!-- Detail Modal -->
                            <div class="modal fade" id="detailModal-{{ $asset->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detailModalLabel-{{ $asset->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel-{{ $asset->id }}">Detail
                                                <strong> {{ $asset->nama_barang }} </strong>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>

                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>
                                                    <p><strong>Kode Barang:</strong> {{ $asset->nama_barang }}</p>

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
                    {{ $assets->links() }}
                </div>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {

            $('#addForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                $.ajax({
                    url: "{{ route('assets.store.perolehan') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Menambahkan data...',
                            text: 'Silakan tunggu...',
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            allowOutsideClick: false
                        });
                    },
                    success: function(response) {
                        Swal.close();

                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message + (response.newDataCount > 0 ?
                                    ` (${response.newDataCount} data baru berhasil ditambahkan)` :
                                    ''),
                                toast: true,
                                position: 'top-end',
                                timer: 5000,
                                showConfirmButton: false
                            });


                            const search = $('#search').val();
                            const filters = getFilters();
                            loadTable(search, 1, filters);

                            $('#addmodal').modal('hide');
                        } else if (response.status === 'warning') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Perhatian!',
                                text: response.message,
                                toast: true,
                                position: 'top-end',
                                timer: 5000,
                                showConfirmButton: false
                            });

                            $('#addmodal').modal('hide');
                        } else if (response.status === 'info') {
                            // Pemberitahuan jika tidak ada data baru
                            Swal.fire({
                                icon: 'info',
                                title: 'Informasi!',
                                text: response.message,
                                toast: true,
                                position: 'top-end',
                                timer: 5000,
                                showConfirmButton: false
                            });
                        }

                        // Panggil loadTable untuk memuat data baru dengan filter yang sama
                        const filters = getFilters();
                        loadTable($('#search').val(), 1, filters);
                    },
                    error: function(xhr) {
                        Swal.close();
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat mengimpor data. Coba lagi.',
                            toast: true,
                            position: 'top-end',
                            timer: 5000,
                            showConfirmButton: false
                        });
                    }
                });
            })
        })

    @endsection
