@extends('layouts.app')

@section('title', 'Assets')

@section('contents')
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Asset</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $asetsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="/perolehan" class="card-link">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Asset Perolehan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $perolehanCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="/mutasiMasuk" class="card-link">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Asset Mutasi Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mutasimasukCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Asset Hadiah/Hibah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $hibahCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow">
        <div class="card-header py-3 font-weight-bold text-primary">Filter Data Barang</div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-1">
                    <label>Unit</label>
                </div>
                <div class="col-md-5">
                    <select id="unit" name="unit" class="form-control @error('jenis_id') is-invalid @enderror">
                        <option value="">- Pilih Unit-</option>
                        @foreach ($unit as $unit)
                            <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : null }}>
                                {{ $unit->nama_unit }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-1">
                    <label>Jenis</label>
                </div>
                <div class="col-md-5">
                    <select id="jenis" name="jenis" class="form-control @error('jenis_id') is-invalid @enderror">
                        <option value="">- Pilih Jenis-</option>
                        @foreach ($jenis as $jenis)
                            <option value="{{ $jenis->id }}" {{ old('jenis_id') == $jenis->id ? 'selected' : null }}>
                                {{ $jenis->nama_jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-1">
                    <label>Objek</label>
                </div>
                <div class="col-md-5">
                    <select id="objek" name="objek" class="form-control @error('objek_id') is-invalid @enderror">
                        <option value="">- Pilih objek-</option>
                        @foreach ($objek as $objek)
                            <option value="{{ $objek->id }}" {{ old('objek_id') == $objek->id ? 'selected' : null }}>
                                {{ $objek->nama_objek }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-1">
                    <label>Klasifikasi</label>
                </div>
                <div class="col-md-5">
                    <select name="klasifikasi_id" class="form-control @error('klasifikasi_id') is-invalid @enderror">
                        <option value="">- Pilih klasifikasi-</option>
                        @foreach ($Klasifikasi as $klasifikasi)
                            <option value="{{ $klasifikasi->id }}"
                                {{ old('klasifikasi_id') == $klasifikasi->id ? 'selected' : null }}>
                                {{ $klasifikasi->nama_klasifikasi }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


        </div>
    </div>



    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    <!-- Tabel Data Assets -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Assets</h6>
                <div class=" row mr-3">
                    <form id="searchForm" class="form-inline my-2 my-lg-0  mr-3">
                        <input name="search" id="searchInput" class="form-control mr-sm-2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal ">
                        Import Aset
                    </button>
                    <div class="ml-2"><a class="btn btn-info float-end" href="{{ route('exportAsset') }}">Export User
                            Data</a>
                    </div>

                </div>

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
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
                    <tbody id="tableBody" class="text-center">
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
                                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST"
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
                                            <h5 class="modal-title" id="editModalLabel-{{ $asset->id }}">Edit Asset
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
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

                <div class="">
                    {{ $assets->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Asset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('importAsset') }}" method="POST" enctype="multipart/form-data">
                    <br>
                    <div class="p-3"><input type="file" name="file" class="form-control "
                            style="border: none; outline: none;"> </div>
                    @csrf
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success ">Import User Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#jenis').on('change', function() {
                let jenisId = $(this).val();
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
                                $('#objek').empty();
                                $('#objek').append(
                                    '<option value="">-Pilih</option>'
                                );
                                $.each(data, function(key, objek) {
                                    $('select[name="objek"]').append(
                                        '<option value="' + objek.id + '">' + objek
                                        .nama_objek + '</option>'
                                    );
                                });

                                filterData({
                                    category_id: categoryId
                                });
                            }
                        },
                    });
                }
            });
        });

        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                let searchQuery = $(this).val();
                if (searchQuery === "") {
                    $.ajax({
                        url: "{{ route('assets') }}",
                        type: "GET",
                        data: {},
                        success: function(response) {
                            $('#tableBody').empty();
                            if (response.data.length === 0) {
                                $('#tableBody').append(`
                                <tr>
                                    <td colspan="14" class="text-center">Barang tidak ditemukan</td>
                                </tr>
                            `);
                            } else {
                                response.data.forEach(asset => {
                                    $('#tableBody').append(`
                                    <tr>
                                        <td>${asset.kode_barang}</td>
                                        <td>${asset.nama_barang}</td>
                                        <td>${asset.kode_lokasi || '-'}</td>
                                        <td>${asset.thn_pmbelian}</td>
                                        <td>${asset.nilai_perolehan || 'N/A'}</td>
                                        <td>${asset.nilai_akumulasi || 'N/A'}</td>
                                        <td>${asset.merk}</td>
                                        <td>${asset.rangka || '-'}</td>
                                        <td>${asset.bpkb}</td>
                                        <td>${asset.polisi}</td>
                                        <td>${asset.luas || '-'}</td>
                                        <td>${asset.penerbit || '-'}</td>
                                        <td>${asset.nama_ruangan || '-'}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                                    data-target="#editModal-${asset.id}">
                                                    Edit
                                                </button>

                                                <!-- Delete Form -->
                                                <form action="{{ route('assets.destroy', '') }}/${asset.id}" method="POST"
                                                    onsubmit="return confirm('Delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{ route('assets') }}",
                        type: "GET",
                        data: {
                            search: searchQuery
                        },
                        success: function(response) {
                            $('#tableBody').empty();
                            if (response.data.length === 0) {
                                $('#tableBody').append(`
                                <tr>
                                    <td colspan="14" class="text-center">Barang tidak ditemukan</td>
                                </tr>
                            `);
                            } else {
                                response.data.forEach(asset => {
                                    $('#tableBody').append(`
                                    <tr>
                                        <td>${asset.kode_barang}</td>
                                        <td>${asset.nama_barang}</td>
                                        <td>${asset.kode_lokasi || '-'}</td>
                                        <td>${asset.thn_pmbelian}</td>
                                        <td>${asset.nilai_perolehan || 'N/A'}</td>
                                        <td>${asset.nilai_akumulasi || 'N/A'}</td>
                                        <td>${asset.merk}</td>
                                        <td>${asset.rangka || '-'}</td>
                                        <td>${asset.bpkb}</td>
                                        <td>${asset.polisi}</td>
                                        <td>${asset.luas || '-'}</td>
                                        <td>${asset.penerbit || '-'}</td>
                                        <td>${asset.nama_ruangan || '-'}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                                    data-target="#editModal-${asset.id}">
                                                    Edit
                                                </button>

                                                <!-- Delete Form -->
                                                <form action="{{ route('assets.destroy', '') }}/${asset.id}" method="POST"
                                                    onsubmit="return confirm('Delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            // Fungsi untuk memfilter data
            function filterData() {
                const jenisId = $('#jenis').val(); // Ambil nilai jenis
                const objekId = $('#objek').val(); // Ambil nilai objek

                $.ajax({
                    url: '{{ route('filter.assets') }}', // URL ke route filter
                    method: 'GET',
                    data: {
                        jenis_id: jenisId,
                        objek_id: objekId
                    },
                    success: function(response) {
                        updateTable(response); // Panggil fungsi untuk memperbarui tabel
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Fungsi untuk memperbarui data tabel
            function updateTable(data) {
                data.forEach(item => {
                    // Cari baris dengan ID atau atribut tertentu
                    const row = $(`#row-${item.id}`);

                    if (row.length > 0) {
                        // Baris ditemukan, update kolom yang relevan
                        row.find('.kode-barang').text(item.kode_barang);
                        row.find('.nama-barang').text(item.nama_barang);
                        row.find('.tahun-pembelian').text(item.thn_pmbelian);
                        row.find('.merk').text(item.merk);
                        row.find('.rangka').text(item.rangka);
                        row.find('.bpkb').text(item.bpkb);
                        row.find('.polisi').text(item.polisi);
                        // Tambahkan kolom lain sesuai kebutuhan
                    } else {
                        // Baris tidak ditemukan, tambahkan baris baru
                        const newRow = `
                <tr id="row-${item.id}">
                    <td class="kode-barang">${item.kode_barang}</td>
                    <td class="nama-barang">${item.nama_barang}</td>
                    <td class="tahun-pembelian">${item.thn_pmbelian}</td>
                    <td class="merk">${item.merk}</td>
                    <td class="rangka">${item.rangka}</td>
                    <td class="bpkb">${item.bpkb}</td>
                    <td class="polisi">${item.polisi}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <i class="btn far fa-eye" data-toggle="modal"
                                data-target="#detailModal-${item.id}"></i>
                            <i class="btn fas fa-edit" data-toggle="modal"
                                data-target="#editModal-${item.id}"></i>
                            <form action="/assets/${item.id}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn fas fa-trash-alt"></button>
                            </form>
                        </div>
                    </td>
                </tr>
            `;
                        $('#tableBody').append(newRow);
                    }
                });
            }


            // Tambahkan event listener ke dropdown
            $('#jenis, #objek').on('change', function() {
                filterData(); // Panggil fungsi filter saat dropdown berubah
            });

            // Panggil filter pertama kali untuk memuat data awal
            filterData();
        });
    </script>

@endsection
