@extends('layouts.app')

@section('title', 'Assets')

@section('contents')

    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>
    <a href="{{ route('assets.create') }}" class="btn btn-primary">Add Asset</a>
    {{-- <a href="{{ route('importAsset') }}" class="btn btn-primary">Import Asset</a> --}}
    <form action="{{ route('importAsset') }}" method="POST" enctype="multipart/form-data">
        <br>
        @csrf
        <input type="file" name="file" class="form-control">

        <br>

        <button class="btn btn-success ">Import User Data</button>
        <a class="btn btn-warning float-end" href="{{ route('exportAsset') }}">Export User Data</a>
    </form>
    
    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Assets</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>AsalUsul</th>
                        </tr>
                        {{-- <th>No</th>
                            <th>Nama barang</th>
                            <th>kode barang</th>
                            <th>no ba terima</th>
                            <th>tgl ba terima</th>
                            {{-- <th>Action</th> --}}
                        {{-- </tr> --}}
                    </thead>
                    <tbody>
                        @if ($assets->count() > 0)
                            @foreach ($assets as $asset)
                                <tr>
                                    <td>{{ $asset->id }}</td>
                                    <td>{{ $asset->nama_barang }}</td>
                                    <td>{{ $asset->jenis->nama_jenis ?? 'N/A' }}</td>
                                    <td>{{ $asset->kategori->nama_kategori ?? 'N/A' }}</td>
                                    <td>{{ $asset->asal->nama_asal ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">Assets not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container"> class="container">

    <div class="card bg-light mt-3"><div class="card bg-light mt-3">

        <div class="card-header"><div class="card-header">

            Laravel 10 Import Export Excel to Database Example - ItSolutionStuff.com

        </div></div>

        <div class="card-body"><div class="card-body">

            <form action="{{ route('importAsset') }}" method="POST" enctype="multipart/form-data"><form action="{{ route('importAsset') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <input type="file" name="file" class="form-control"><input type="file" name="file" class="form-control">

                <br><br>

                <button class="btn btn-success">Import User Data</button><button class="btn btn-success">Import User Data</button>

            </form></form> --}}



    {{-- <table class="table table-bordered mt-3"><table class="table table-bordered mt-3">

                <tr><tr>

                    <th colspan="3"><th colspan="3">

                        List Of Users

                        <a class="btn btn-warning float-end" href="{{ route('exportAsset') }}">Export User Data</a><a class="btn btn-warning float-end" href="{{ route('exportAsset') }}">Export User Data</a>

                    </th></th>

                </tr></tr>

                <tr><tr>

                    <th>ID</th><th>ID</th>

                    <th>Name</th><th>Name</th>

                    <th>Email</th><th>Email</th>

                </tr></tr>

                @foreach ($users as $user)

                <tr><tr>

                    <td>{{ $user->id }}</td><td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td><td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td><td>{{ $user->email }}</td>

                </tr></tr>

                @endforeach

            </table></table> --}}


    {{--
        </div></div>

    </div></div>

</div> --}}

@endsection
