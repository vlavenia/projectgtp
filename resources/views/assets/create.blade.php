@extends('layouts.app')

@section('title', 'Create Asset')

@section('contents')
    <h1 class="mb-0">Add Create</h1>
    <hr />
    <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama_barang" class="form-control" placeholder="nama barang">
            </div>
            <div class="col">
                <input type="text" name="kode_barang" class="form-control" placeholder="kode barang">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="no_ba_terima" class="form-control" placeholder="no ba terima">
            </div>
            <div class="col">
                <input type="text" name="tgl_ba_terima" class="form-control" placeholder="tgl ba terima">
            </div>
        </div>
        <div class="row mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                <option value="">- Pilih -</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : null }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
