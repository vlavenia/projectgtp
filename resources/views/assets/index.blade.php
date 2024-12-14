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
        <div class="card-header py-3 font-weight-bold text-primary">
            <div class="row ">
                <p>Filter Data Barang</p>
                <button id="resetButton" class="btn btn-secondary ml-3">Reset</button>
            </div>
        </div>
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
                                {{ $jenis->jenis_asset }}
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
                    <select id="klasifikasi" name="klasifikasi_id"
                        class="form-control @error('klasifikasi_id') is-invalid @enderror">
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
                        <input name="search" id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search" aria-label="Search">
                        {{-- <button id="searchButton" class="btn btn-outline-success my-2 my-sm-0"
                            type="submit">Search</button> --}}
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
                <div id="table-container">
                    @include('assets.partials.table', ['assets' => $assets])
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

            function loadTable(search = '', page = 1, filters = {}) {
                $.ajax({
                    url: '{{ route('filter.assets') }}',
                    method: 'GET',
                    data: {
                        search: search,
                        page: page,
                        ...filters
                    },
                    success: function(response) {
                        $('#table-container').html(
                        response);
                    },
                    error: function() {
                        alert('Gagal memuat data.');
                    }
                });
            }

            // Fungsi untuk memuat data default
            function loadDefaultData() {
                const filters = {
                    jenis_id: $('#jenis').val(),
                    objek_id: $('#objek').val(),
                    unit_id: $('#unit').val(),
                    klasifikasi_id: $('#klasifikasi').val()
                };
                loadTable('', 1, filters); // Memuat data dengan filter yang ada
            }

            // Event untuk pencarian
            $('#search').on('keyup', function() {
                const search = $(this).val(); // Ambil nilai pencarian
                const filters = {
                    jenis_id: $('#jenis').val(),
                    objek_id: $('#objek').val(),
                    unit_id: $('#unit').val(),
                    klasifikasi_id: $('#klasifikasi').val()
                };

                // Memuat tabel dengan pencarian yang mempertimbangkan filter yang sudah ada
                loadTable(search, 1, filters);
            });

            // Event untuk pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                const page = new URLSearchParams(url.split('?')[1]).get(
                'page'); // Mendapatkan halaman dari URL
                const search = $('#search').val();
                const filters = {
                    jenis_id: $('#jenis').val(),
                    objek_id: $('#objek').val(),
                    unit_id: $('#unit').val(),
                    klasifikasi_id: $('#klasifikasi').val()
                };
                loadTable(search, page, filters); // Memuat tabel sesuai dengan halaman yang dipilih
            });

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
                                $('#objek').empty().append('<option value="">-Pilih</option>');
                                $.each(data, function(key, objek) {
                                    $('#objek').append('<option value="' + objek.id +
                                        '">' + objek.nama_objek + '</option>');
                                });

                                // Setelah mengupdate objek, muat data dengan filter terbaru
                                const filters = {
                                    jenis_id: $('#jenis').val(),
                                    objek_id: $('#objek').val(),
                                    unit_id: $('#unit').val(),
                                    klasifikasi_id: $('#klasifikasi').val()
                                };
                                loadTable($('#search').val(), 1,
                                filters); // Memuat data berdasarkan filter yang dipilih
                            }
                        },
                        error: function(xhr) {
                            console.error('Error: ' + xhr.responseText);
                        }
                    });
                }
            });

            // Event listener untuk perubahan pada semua dropdown
            $('#jenis, #objek, #unit, #klasifikasi').on('change', function() {
                loadDefaultData(); // Memuat data berdasarkan filter yang dipilih
            });

            // Event untuk tombol reset
            $('#resetButton').on('click', function() {
                $('#jenis, #objek, #unit, #klasifikasi').val('');
                loadDefaultData(); // Memuat data tanpa filter dan pencarian
            });

            // Muat data default saat halaman pertama kali dibuka
            loadDefaultData();
        });
    </script>





@endsection
