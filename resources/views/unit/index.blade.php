@extends('layouts.app')

@section('title', 'Unit Menu')

@section('contents')

    <div class="mb-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addUnitmodal">
        Tambah
    </button>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Unit</h6>
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
                        @foreach ($units as $unit)
                            <tr class="text-center">
                                <td>{{ $unit->nama_unit }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#editUnitmodal{{$unit->id}}">
                                            Edit
                                        </button>

                                        <form action="{{ route('unit.delete', $unit->id) }}" method="POST" onsubmit="return confirm('Delete?')">
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
                    {{ $units->links() }}
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
@foreach ($units as $unit)
<div class="modal fade" id="editUnitmodal{{ $unit->id }}" tabindex="-1" role="dialog" aria-labelledby="editUnitmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUnitmodalLabel">Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('unit.update',$unit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="form-group p-1">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $unit->nama_unit }}"
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
<div class="modal fade" id="addUnitmodal" tabindex="-1" role="dialog" aria-labelledby="addUnitmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUnitmodalLabel">Tambah Data Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('unit.add')}}" method="POST" enctype="multipart/form-data">
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
