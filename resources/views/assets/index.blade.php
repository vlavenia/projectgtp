@extends('layouts.app')

@section('title', 'Assets')

@section('contents')
    <div class="row">
        <!-- Jumlah Asset Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Asset</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $asetsCount }} </div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Asset Card -->

        <!-- Earnings (Annual) Card Example -->
        <a href="/perolehan" class="card-link col-xl-3 col-md-6 mb-4">

            <div class="">
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
            </div>
        </a>

        <!-- Earnings (Annual) Card Example -->
        <a href="/mutasiMasuk" class="card-link col-xl-3 col-md-6 mb-4">
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

    <div class="card shadow">
        <div class="card-header py-3 font-weight-bold text-primary">Filter Data Barang</div>
        <div class="card-body">

            {{-- <label for="jenis">Pilih Jenis:</label>
            <select id="jenis" name="jenis">
                <option value="">-- Pilih Jenis --</option>
                @foreach ($jenis as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                @endforeach
            </select>

            <label for="objek">Pilih Objek:</label>
            <select id="objek" name="objek">
                <option value="">-- Pilih Objek --</option>
            </select> --}}

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

            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

            <script>
                $(document).ready(function() {
                    // Ambil token CSRF dari meta tag
                    // let csrfToken = $('meta[name="csrf-token"]').attr('content');

                    // Ketika dropdown 'jenis' berubah
                    $('#jenis').on('change', function() {
                        let jenisId = $(this).val(); // Ambil ID jenis yang dipilih
                        console.log(jenisId);

                        // // Hapus opsi sebelumnya di dropdown 'objek'
                        // $('objek').html('<option value="">-- Pilih Objek --</option>');

                        // Jika jenis dipilih, lakukan permintaan AJAX
                        if (jenisId) {
                            // console.log('masuk');
                            $.ajax({
                                url: '/objek/' + jenisId, // Endpoint
                                type: 'POST',
                                data: {
                                    // jenis_id: jenisId,
                                    '_token': '{{ csrf_token() }}' // Kirim token CSRF untuk keamanan
                                },
                                dataType: 'json',
                                success: function(data) {
                                    console.log(data);
                                    // // Tambahkan opsi ke dropdown 'objek'
                                    if (data) {
                                        $('#objek').empty(); // Menghapus semua opsi sebelumnya
                                        $('#objek').append(
                                            '<option value="">-Pilih</option>'
                                            ); // Tambahkan opsi default

                                        // Iterasi melalui data dan tambahkan opsi ke dropdown
                                        $.each(data, function(key, objek) {
                                            $('select[name="objek"]').append(
                                                '<option value="' + objek.id + '">' + objek
                                                .nama_objek + '</option>'
                                            );
                                        });
                                    }
                                    // data.forEach(function(item) {
                                    //     $('#objek').append('<option value="' + item.id + '">' +
                                    //         item.nama_objek + '</option>');
                                    // });
                                },
                                // error: function(xhr) {
                                //     console.log('Error:', xhr);
                                // }
                            });
                        }
                    });
                });
            </script>
        </div>
    </div>


    {{-- <a href="{{ route('assets.create') }}" class="btn btn-primary">Add Asset</a> --}}
    <!-- Button trigger modal -->



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
                                {{-- <td>{{ $asset->jenis->nama_jenis ?? 'N/A' }}</td>
                            <td>{{ $asset->asal->nama_asal ?? 'N/A' }}</td> --}}
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <!-- Edit Button -->
                                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                            data-target="#editModal-{{ $asset->id }}">
                                            Edit
                                        </button>

                                        <!-- Delete Form -->
                                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST"
                                            onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
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
                        @empty
                            <tr>
                                <td colspan="14">Assets not found</td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
                <!-- Pagination Links -->
                <div class="">
                    {{ $assets->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
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
            $('#searchInput').on('keyup', function() {
                let searchQuery = $(this).val(); // Ambil nilai input pencarian

                // Jika input kosong, reset dan ambil semua data
                if (searchQuery === "") {
                    $.ajax({
                        url: "{{ route('assets') }}", // Endpoint Laravel
                        type: "GET",
                        data: {},
                        success: function(response) {
                            // Kosongkan tabel
                            $('#tableBody').empty();

                            // Cek jika data kosong
                            if (response.data.length === 0) {
                                $('#tableBody').append(`
                                <tr>
                                    <td colspan="14" class="text-center">Assets not found</td>
                                </tr>
                            `);
                            } else {
                                // Tambahkan data baru
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
                    // Jika ada query pencarian, kirim permintaan AJAX dengan query pencarian
                    $.ajax({
                        url: "{{ route('assets') }}", // Endpoint Laravel
                        type: "GET",
                        data: {
                            search: searchQuery
                        },
                        success: function(response) {
                            // Kosongkan tabel
                            $('#tableBody').empty();

                            // Cek jika data kosong
                            if (response.data.length === 0) {
                                $('#tableBody').append(`
                                <tr>
                                    <td colspan="14" class="text-center">Assets not found</td>
                                </tr>
                            `);
                            } else {
                                // Tambahkan data baru
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
    </script>

@endsection
