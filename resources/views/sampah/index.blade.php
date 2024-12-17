@extends('layouts.app')

@section('title', 'Sampah')

@section('contents')

    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Sampah</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk</th>
                            <th>BPKB</th>
                            <th>Polisi</th>
                            <th>Deleted At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trashedAssets as $asset)
                            <tr>
                                <td>{{ $asset->kode_barang }}</td>
                                <td>{{ $asset->nama_barang }}</td>
                                <td>{{ $asset->merk }}</td>
                                <td>{{ $asset->bpkb }}</td>
                                <td>{{ $asset->polisi }}</td>

                                <td>{{ $asset->deleted_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('assets.restore', $asset->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning mr-2">Restore</button>
                                        </form>
                                        <form action="{{ route('assets.forceDelete', $asset->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger fas fa-trash-alt" type="submit"> Hapus Permanen</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
