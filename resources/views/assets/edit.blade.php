@extends('layouts.app')

@section('title', 'Edit Asset')

@section('contents')
    <h1 class="mb-0">Edit Asset</h1>
    <hr />
    <form action="{{ route('assets.update', $asset->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="nama_barang" value="{{ $asset->nama_barang }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">kode barang</label>
                <input type="text" name="kode_barang" class="form-control" placeholder="kode_barang" value="{{ $asset->kode_barang }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">no ba terima</label>
                <input type="text" name="no_ba_terima" class="form-control" placeholder="no_ba_terima" value="{{ $asset->no_ba_terima }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                 <input type="text" name="tgl_ba_terima" class="form-control" placeholder="tgl_ba_terima" value="{{ $asset->tgl_ba_terima }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
