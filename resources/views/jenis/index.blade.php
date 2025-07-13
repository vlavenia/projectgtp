@extends('layouts.app')

@section('title', 'Jenis Menu')

@section('contents')

    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addJenismodal">
        Tambah
    </button>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Jenis</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Nama User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenises as $jenis)
                            <tr class="text-center">
                                <td>{{ $jenis->jenis_asset }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#editJenismodal{{$jenis->id}}">
                                            Edit
                                        </button>

                                        <form action="{{ route('jenis.delete', $jenis->id) }}" method="POST" onsubmit="return confirm('Delete?')">
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
                    {{ $jenises->links() }}
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
@foreach ($jenises as $jenis)
<div class="modal fade" id="editJenismodal{{ $jenis->id }}" tabindex="-1" role="dialog" aria-labelledby="editJenismodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editJenismodalLabel">Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('jenis.update',$jenis->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="form-group p-1">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $jenis->jenis_asset }}"
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
<div class="modal fade" id="addJenismodal" tabindex="-1" role="dialog" aria-labelledby="addJenismodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addJenismodalLabel">Tambah Data Jenis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('jenis.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="form-group p-1">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value=""
                            required>
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
