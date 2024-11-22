@extends('layouts.app')

@section('title', 'Mutasi Keluar')

@section('contents')

    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>
    <a href="" class="btn btn-primary">Add Asset Mutasi Keluar</a>
    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Asset Mutasi Keluar</h6>
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

@endsection
