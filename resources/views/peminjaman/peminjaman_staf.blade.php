@extends('layouts.app')

@section('title', 'Peminjaman Asset (Staf)')

@section('contents')

    <div class="mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal ">
            Tambah pengajuan
        </button>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajuan Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('peminjaman.addpeminjaman') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <label>Pilih Asset</label>
                                <select name="asset_id" class="asset_select" style="width:100%">
                                    <option value="">- Pilih -</option>
                                    <option value="0">Bukan Aset</option>
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

                                <div class="mt-4">
                                    <label>Deskripsi Peminjaman</label>
                                    <textarea class="form-control" name="deskripsi" placeholder="Alasan Peminjaman" id=""></textarea>
                                </div>

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



    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Asset yang dipinjam</h6>
                <div class=" row mr-3">
                    <form id="searchForm" class="form-inline my-2 my-lg-0 mr-3" method="GET"
                        action="{{ route('search.staf') }}">
                        @csrf
                        <input name="search" id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                        <div class="ml-2">
                            <a class="btn btn-secondary" href="{{ route('peminjaman_staf') }}">Reset</a>
                        </div>
                    </form>
                    {{-- <div class="ml-2"><a class="btn btn-info float-end"
                            href="{{ route('exportAsset.penghapusan') }}">Export
                            Data</a>
                    </div> --}}

                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Merk</th>
                            <th>BPKB</th>
                            <th>Polisi</th>
                            <th>Tanggal Peminjaman</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($asset_peminjaman as $asset)
                            <tr>
                                <td>{{ $asset->kode_barang ?? '-' }}</td>
                                <td>{{ $asset->nama_barang  ?? '-'}}</td>
                                <td>{{ $asset->deskripsi  ?? '-'}}</td>
                                <td>{{ $asset->merk  ?? '-'}}</td>
                                <td>{{ $asset->bpkb  ?? '-'}}</td>
                                <td>{{ $asset->polisi  ?? '-'}}</td>
                                <td>{{ $asset->tanggal_peminjaman  ?? '-'}}</td>
                                <td>{{ $asset->name  ?? '-'}}</td>
                                {{-- <td>{{ $asset->peminjaman_id ?? '-'}}</td> --}}
                                <td>
                                    @if ($asset->status == 'request')
                                        <span class="bg-warning px-2 rounded text-white">Menunggu Peminjaman</span>
                                    @elseif($asset->status == 'request_return')
                                        <span class="bg-warning px-2 rounded text-white">Menunggu Pengembalian</span>
                                    @elseif($asset->status == 'approve')
                                        <span class="bg-success px-2 rounded text-white">Dipinjam</span>
                                    @elseif($asset->status == 'reject_return')
                                        <span class="bg-danger px-2 rounded text-white">Pengulangan Pengembalian</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <button class="btn btn-dark d-flex align-items-center gap-1" data-toggle="modal"
                                            data-target="#detailModal-{{ $asset->id }}">
                                            <i class="fas far fa-eye"> </i>
                                            <span> Detail</span>
                                        </button>

                                        @if ($asset->status == 'request')
                                            <button class="btn btn-danger d-flex align-items-center " data-toggle="modal"
                                                data-target="#cancelModal-{{ $asset->peminjaman_id }}">
                                                <i class="fas fa-trash-alt"> </i>
                                                <span> Batalkan</span>
                                            </button>
                                        @elseif ($asset->status == 'reject_return')
                                            <button class="btn btn-danger  d-flex align-items-center " data-toggle="modal"
                                                data-target="#ReturnModal-{{ $asset->peminjaman_id }}">
                                                <i class="fas fa-check-circle"> </i>
                                                <span> Pengembalian Ulang </span>
                                            </button>
                                        @elseif ($asset->status == 'approve')
                                            <button class="btn btn-info  d-flex align-items-center " data-toggle="modal"
                                                data-target="#ReturnModal-{{ $asset->peminjaman_id }}">
                                                <i class="fas fa-check-circle"> </i>
                                                <span> Pengembalian </span>
                                            </button>

                                            {{-- <form action="{{ route('ReturnPeminjaman', $asset->peminjaman_id) }}"
                                                method="POST" onsubmit="return confirm('Kembalikan Aset?')">
                                                @csrf
                                                <button class="btn btn-success  fas fas fa-check-circle "></button>
                                            </form> --}}
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <!-- Cancel Modal -->
                            <div class="modal fade" id="cancelModal-{{ $asset->peminjaman_id }}" tabindex="-1"
                                role="dialog" aria-labelledby="cancelLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content shadow rounded-lg">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="cancelLabel">Konfirmasi Pembatalan</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body text-center">
                                            <i class="fas fa-times-circle fa-3x text-danger mb-3"></i>
                                            <p class="mb-2">Yakin ingin <strong>membatalkan</strong> pengajuan peminjaman
                                                aset ini?</p>
                                            <small class="text-muted">Aksi ini akan menghapus pengajuan peminjaman dari
                                                sistem.</small>
                                        </div>

                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ route('assets.destroy.peminjaman', $asset->peminjaman_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-4">Ya, Batalkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- END Cancel Modal -->

                            <!-- Return Penminjaman Modal -->
                            <div class="modal fade" id="ReturnModal-{{ $asset->peminjaman_id }}" tabindex="-1"
                                role="dialog" aria-labelledby="cancelLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content shadow rounded-lg">
                                        <div class="modal-header bg-info text-white">
                                            <h5 class="modal-title" id="cancelLabel">Konfirmasi Pengembalian</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-footer justify-content-center">
                                            <form action="{{ route('requestReturnPeminjaman', $asset->peminjaman_id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="my-4">
                                                    <h5>Upload File Bukti Pengembalian</h5>
                                                    <input name="bukti_pengembalian" type="file" required />
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-info px-4">Kembalikan Asset</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- END Cancel Modal -->

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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="14">Saat ini tidak peminjaman yang diajukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $asset_peminjaman->links() }}
                </div>
            </div>
        </div>
    </div>


    {{-- Card History Peminjaman --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">History Peminjaman</h6>
                <div class=" row mr-3">
                    <form id="searchForm" class="form-inline my-2 my-lg-0 mr-3" method="GET"
                        action="{{ route('search.staf') }}">
                        @csrf
                        <input name="search" id="search" class="form-control mr-sm-2" type="search"
                            placeholder="Search" aria-label="Search">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                        <div class="ml-2">
                            <a class="btn btn-secondary" href="{{ route('peminjaman_staf') }}">Reset</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('peminjaman.partials.historyCard', ['assets' => $assets])
            </div>
        </div>
    </div>
    {{-- END Card History Peminjaman --}}


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

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

            $(".asset_select").select2({
                dropdownParent: $("#exampleModal")
            });


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

        //button update
        $(document).on('click', '.updateAssetBtn', function() {
            const id = $(this).data('id');
            const url = '{{ route('assets.update.penghapusan', ':id') }}'.replace(':id', id);

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

        //button edit
        $(document).on('click', '.editAssetBtn', function() {
            const assetId = $(this).data('id');
            const jenisId = $(this).data('jenisid');
            const objekId = $(this).data('objekid');
            console.log("objekId:");
            console.log(objekId);
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
