@extends('layouts.app')

@section('title', 'Klasifikasi Menu')

@section('contents')

    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif

    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addKlasifikasimodal">
        Tambah
    </button>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Klasifikasi</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Nama Klasifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($klasifikasis as $klasifikasi)
                            <tr class="text-center">
                                <td>{{ $klasifikasi->nama_klasifikasi }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#editKlasifikasimodal{{$klasifikasi->id}}">
                                            Edit
                                        </button>

                                        <form action="{{ route('klasifikasi.delete', $klasifikasi->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger fas fa-trash-alt m-1" type="submit"> Hapus</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $klasifikasis->links() }}
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
@foreach ($klasifikasis as $klasifikasi)
<div class="modal fade" id="editKlasifikasimodal{{ $klasifikasi->id }}" tabindex="-1" role="dialog" aria-labelledby="editKlasifikasimodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKlasifikasimodalLabel">Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('klasifikasi.update',$klasifikasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="form-group p-1">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $klasifikasi->nama_klasifikasi }}"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
@endforeach
<!-- Edit Modal -->

<!-- ADD Modal -->
<div class="modal fade" id="addKlasifikasimodal" tabindex="-1" role="dialog" aria-labelledby="addKlasifikasimodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addKlasifikasimodalLabel">Tambah Data Klasifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
      <form action="{{ route('klasifikasi.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Add Modal -->
    
@endsection
