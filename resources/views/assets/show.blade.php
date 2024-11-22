@extends('layouts.app')

@section('title', 'Show Asset')

@section('contents')
    <h1 class="mb-0">Detail Asset</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="nama_barang" value="{{ $asset->nama_barang }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">kode barang</label>
            <input type="text" name="kode_barang" class="form-control" placeholder="kode_barang" value="{{ $asset->kode_barang }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">no ba terima</label>
            <input type="text" name="no_ba_terima" class="form-control" placeholder="no_ba_terima" value="{{ $asset->no_ba_terima }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">tgl ba terima</label>
            <input type="text" name="tgl_ba_terima" class="form-control" placeholder="tgl_ba_terima" value="{{ $asset->tgl_ba_terima }}" readonly>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
        </div>
    </div> --}}
@endsection
