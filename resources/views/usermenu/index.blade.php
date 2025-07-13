@extends('layouts.app')

@section('title', 'User Menu')

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
                <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->role_name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <!-- <a href="" class="btn btn-warning mr-2 editUsermodal" data-dismiss="modal"
                                            data-target="#editUsermodal{{ $user->id }}" data-toggle="modal">Edit
                                            User
                                        </a> -->
                                        <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#editUsermodal{{$user->id}}">
                                            Edit
                                        </button>

                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger fas fa-trash-alt m-1" type="submit"> Hapus</button>
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

<!-- Modal -->
@foreach ($users as $user)
<div class="modal fade" id="editUsermodal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUsermodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUsermodalLabel">Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-2">
            <form id="" action="{{ route('usermenu.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="form-group p-1">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                            required>
                    </div>
                    <div class="form-group p-1">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                            required>
                    </div>
                    <div class="form-group p-1">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"
                            value="{{ $user->password }}" required>
                    </div>
                    <div class="form-group p-1">
                        <label>Role</label>
                        <select name="role_id" id="" class="form-control" required>
                            <option value="">--Choose--</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->role_name }}
                                </option>
                            @endforeach
                        </select>
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


    
@endsection
