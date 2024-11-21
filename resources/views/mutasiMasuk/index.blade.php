@extends('layouts.app')

@section('title', 'Asset Mutasi Masuk')

@section('contents')

    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>
    <a href="" class=" btn btn-primary" data-dismiss="modal" data-target="modal-addMutasiKeluar">Add Asset </a>
    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar penghapusan Asset </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama barang</th>
                            <th>kode barang</th>
                            <th>no ba terima</th>
                            <th>tgl ba terima</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- <tbody>

                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->nama_barang }}</td>
                            <td class="align-middle">{{ $rs->kode_barang }}</td>
                            <td class="align-middle">{{ $rs->no_ba_terima }}</td>
                            <td class="align-middle">{{ $rs->tgl_ba_terima }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('assets.show', $rs->id) }}" type="button"
                                        class="btn btn-secondary">Detail</a>
                                    <a href="{{ route('assets.edit', $rs->id) }}" type="button"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('assets.destroy', $rs->id) }}" method="POST" type="button"
                                        class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">

                                        @method('DELETE')
                                        <button class="btn btn-danger m-0">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center" colspan="5">Assets not found</td>
                        </tr>

                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>


    {{-- modal --}}
    <div class="modal fade" id="modal-addMutasiKeluar" tabindex="-1" role="dialog" aria-labelledby="modalDefaultLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDefaultLabel">Tambah Klasifikasi </h4>
                    <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" " method="POST">
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    @csrf
                                    <label for="name_classification">Nama Klasifikasi Aset:</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name_classification"
                                            id="name_classification" placeholder="masukkan nama klasifikasi" value="">
                                        @error('name_classification')
                                            <p></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
