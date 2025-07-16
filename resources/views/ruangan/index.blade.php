@extends('layouts.app')

@section('title', 'Ruangan Menu')

@section('contents')

    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addRuanganmodal">
        Tambah
    </button>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ruangan</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Nama Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ruangans as $ruangan)
                            <tr class="text-center">
                                <td>{{ $ruangan->nama_ruangan }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#editRuanganmodal{{$ruangan->id}}">
                                            Edit
                                        </button>

                                        <form action="{{ route('ruangan.delete', $ruangan->id) }}" method="POST" onsubmit="return confirm('Delete?')">
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
                    {{ $ruangans->links() }}
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
@foreach ($ruangans as $ruangan)
<div class="modal fade" id="editRuanganmodal{{ $ruangan->id }}" tabindex="-1" role="dialog" aria-labelledby="editRuanganmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRuanganmodalLabel">Edit Data Ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('ruangan.update',$ruangan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="form-group p-1">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $ruangan->nama_ruangan }}"
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
<div class="modal fade" id="addRuanganmodal" tabindex="-1" role="dialog" aria-labelledby="addRuanganmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRuanganmodalLabel">Tambah Data Ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('ruangan.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col">
                    <div class="form-group p-1">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value=""
                            required>
                    </div>
                    <div class="form-group p-1">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- END Add Modal -->
    
@endsection
