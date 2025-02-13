@extends('layouts.app')

@section('title', 'Assets')

@section('contents')
    <p class="mb-4">Halaman ini menampilkan daftar asset terkini.
    </p>
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

                    </form>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal ">
                        Import Aset
                    </button>
                    <div class="ml-2"><a class="btn btn-info float-end" href="{{ route('exportAsset') }}">Export
                            Data</a>
                    </div>

                </div>

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div id="table-container">
                    @include('assets.partials.table', ['assets' => $assets, 'jenis' => $jenis_select])
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
                <form id="importForm" action="{{ route('importAsset') }}" method="POST" enctype="multipart/form-data">
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
                        $('#table-container').html(response.html);
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('Gagal memuat data.');
                    }
                });
            }

            function loadDefaultData() {
                const filters = getFilters();
                loadTable('', 1, filters);
            }

            function getFilters() {
                return {
                    jenis_id: $('#jenis').val(),
                    objek_id: $('#objek').val(),
                    unit_id: $('#unit').val(),
                    klasifikasi_id: $('#klasifikasi').val()
                };
            }

            $('#search').on('keyup', function() {

                const search = $(this).val();
                const filters = getFilters();
                loadTable(search, 1, filters);
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                const page = new URLSearchParams(url.split('?')[1]).get('page');
                const search = $('#search').val();
                const filters = getFilters();
                loadTable(search, page, filters);
            });

            $('#jenis').on('change', function() {
                const jenisId = $(this).val();
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
                                $('#objek').empty().append(
                                    '<option value="">-Pilih Objek-</option>');
                                $.each(data, function(key, objek) {
                                    $('#objek').append(
                                        `<option value="${objek.id}">${objek.nama_objek}</option>`
                                    );
                                });

                                const filters = getFilters();
                                loadTable($('#search').val(), 1, filters);
                            }

                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                            alert('Gagal memuat data objek.');
                        }
                    });
                }
            });


            $('#jenis, #objek, #unit, #klasifikasi').on('change', function() {
                loadDefaultData();
            });

            $('#resetButton').on('click', function() {
                $('#jenis, #objek, #unit, #klasifikasi').val('');
                loadDefaultData();
            });

            $('#importForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('importAsset') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Mengimpor...',
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
                            loadTable(search, 1, filters); // Memuat data terbaru setelah impor

                            $('#exampleModal').modal('hide');
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

                            $('#exampleModal').modal('hide');
                        } else if (response.status === 'info') {
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
            });

            $(document).on('click', '.updateAssetBtn', function() {
                const id = $(this).data('id');
                const url = '{{ route('assets.update', ':id') }}'.replace(':id', id);

                // Ambil nilai tahun pembelian
                const thnPembelian = $(`#thn_pembelian-${id}`).val();
                const currentYear = new Date().getFullYear();

                if (thnPembelian && (thnPembelian < 1900 || thnPembelian > currentYear)) {
                    Swal.fire({
                        title: "Error!",
                        text: `Tahun Pembelian harus antara 1900 - ${currentYear}.`,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                    return; // Hentikan eksekusi AJAX jika input tidak valid
                }

                // const data = {
                //     _token: '{{ csrf_token() }}',
                //     _method: 'PUT',
                //     nama_barang: $(`#nama_barang-${id}`).val(),
                //     kode_barang: $(`#kode_barang-${id}`).val(),
                //     no_register: $(`#no_register-${id}`).val(),
                //     merk: $(`#merk-${id}`).val(),
                //     bahan: $(`#bahan-${id}`).val(),
                //     thn_pmbelian: thnPembelian,
                //     pabrik: $(`#pabrik-${id}`).val(),
                //     rangka: $(`#rangka-${id}`).val(),
                //     mesin: $(`#mesin-${id}`).val(),
                //     polisi: $(`#polisi-${id}`).val(),
                //     bpkb: $(`#bpkb-${id}`).val(),
                //     asal_id: $(`#asal_id-${id}`).val(),
                //     jenis_id: $(`#jenis_id-${id}`).val(),
                //     unit_id: $(`#unit_id-${id}`).val(),
                //     objek_id: $(`#objek_id-${id}`).val(),
                //     klasifikasi_id: $(`#klasifikasi_id-${id}`).val(),
                //     harga: $(`#harga-${id}`).val(),
                //     deskripsi_brg: $(`#deskripsi_brg-${id}`).val(),
                //     keterangan: $(`#keterangan-${id}`).val(),
                //     opd: $(`#opd-${id}`).val(),
                //     img_url: $(`#img_url-${id}`).val(),
                //
                // };

                let formData = new FormData();
                let fileInput = document.querySelector(`#img_url-${id}`);

                if (fileInput && fileInput.files.length > 0) {
                    formData.append('gambar', fileInput.files[0]);
                }
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('_method', 'PUT');
                formData.append('nama_barang', document.querySelector(`#nama_barang-${id}`).value);
                formData.append('kode_barang', document.querySelector(`#kode_barang-${id}`).value);
                formData.append('no_register', document.querySelector(`#no_register-${id}`).value);
                formData.append('merk', document.querySelector(`#merk-${id}`).value);
                formData.append('bahan', document.querySelector(`#bahan-${id}`).value);
                formData.append('thn_pmbelian', thnPembelian);
                formData.append('pabrik', document.querySelector(`#pabrik-${id}`).value);
                formData.append('rangka', document.querySelector(`#rangka-${id}`).value);
                formData.append('mesin', document.querySelector(`#mesin-${id}`).value);
                formData.append('polisi', document.querySelector(`#polisi-${id}`).value);
                formData.append('bpkb', document.querySelector(`#bpkb-${id}`).value);
                formData.append('asal_id', document.querySelector(`#asal_id-${id}`).value);
                formData.append('jenis_id', document.querySelector(`#jenis_id-${id}`).value);
                formData.append('unit_id', document.querySelector(`#unit_id-${id}`).value);
                formData.append('objek_id', document.querySelector(`#objek_id-${id}`).value);
                formData.append('klasifikasi_id', document.querySelector(`#klasifikasi_id-${id}`).value);
                formData.append('harga', document.querySelector(`#harga-${id}`).value);
                formData.append('deskripsi_brg', document.querySelector(`#deskripsi_brg-${id}`).value);
                formData.append('keterangan', document.querySelector(`#keterangan-${id}`).value);
                formData.append('opd', document.querySelector(`#opd-${id}`).value);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false, // Harus `false` agar FormData bekerja
                    processData: false, // Harus `false` agar data tidak dikonversi ke string
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Success!",
                            text: "Data berhasil diperbarui.",
                            icon: "success",
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000
                        });
                        $(`#editModal-${id}`).modal('hide');

                        const search = $('#search').val();
                        const filters = getFilters();

                        loadTable(search, 1, filters);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            title: "Error!",
                            text: "Terjadi kesalahan saat memperbarui data.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    },
                });
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
                        loadObjek(assetId, jenisId, objekId);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            // Event Listener ketika Jenis berubah
            $(`#jenis_id-${assetId}`).on('change', function() {
                const newJenisId = $(this).val();
                console.log("testing assetId, newJenisId");
                console.log(assetId, newJenisId);
                loadObjek(assetId, newJenisId, null); // Reset objek_id ketika jenis berubah
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
                    console.log("++response");
                    console.log(response.Klasifikasi);
                    if (response.Klasifikasi) {
                        $(`#klasifikasi_id-${assetId}`).empty().append(
                            '<option value="">-Pilih Klasifikasi-</option>'
                        );
                        $.each(response.Klasifikasi, function(key, Klasifikasi) {
                            console.log("++klasifikasi lopp");
                            console.log(klasifikasiId);
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
        function loadObjek(assetId, jenisId, objekId) {
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
                            $(`#objek_id-${assetId}`).empty().append('<option value="">-Pilih Objek-</option>');
                            $.each(data, function(key, objek) {
                                $(`#objek_id-${assetId}`).append(
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
                $(`#objek_id-${assetId}`).empty().append('<option value="">-Pilih Objek-</option>');
            }
        }
    </script>



@endsection
