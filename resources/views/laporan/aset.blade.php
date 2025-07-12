@extends('layouts.app')

@section('title', 'Laporan Aset')

@section('contents')

    <p class="mb-4">Laporan Aset adalah laporan yang berkaitan dengan data aset</p>
    
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Aset</h6>
            </div>
        </div>
        <div class="card-body px-12">
            <form id="addForm" action="{{ route('exportSemuaLaporanAset') }}" method="POST">
            @csrf
                <div class="my-2">
                    <h6 class="m-0 font-weight-bold">Status Aset</h6>
                    <select name="jenis_laporan" class="form-control" require>
                        <option value="" disabled selected>-Pilih-</option>
                            <option value="0" >Semua Aset</option>
                            <option value="1" >Aset Terkini </option>
                            <option value="2" >Aset Mutasi Masuk </option>
                            <option value="3" >Aset Mutasi Keluar</option>
                            <option value="4" >Aset Perolehan</option>
                            <option value="5" >Aset Penghapusan</option>
                            <option value="6" >Aset Rusak</option>
                    </select>
                </div>
                
                <div class="my-2">
                    <h6 class="m-0 font-weight-bold">Tanggal</h6>
                    <div class="flex d-flex">
                            <input name="start_date" type="date" class="form-control mr-1">
                            <input name="end_date" type="date" class="form-control ml-1">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Export 
                </button>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
