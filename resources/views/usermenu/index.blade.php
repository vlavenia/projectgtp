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
                    <thead>
                        <tr>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)
                            <tr>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->created_at }}</td>
                                <td>{{ $users->role_id }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        {{-- <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning mr-2 editUsermodal"  data-dismiss="modal" data-target="#editUsermodal" data-toggle="modal">edit</button>
                                        </form> --}}
                                        <a href="" class="btn btn-warning mr-2 editUsermodal" data-dismiss="modal"
                                            data-target="#editUsermodal{{ $users->id }}" data-toggle="modal">Edit
                                            User
                                        </a>
                                        {{-- <a href="" class=" btn btn-primary" data-dismiss="modal"
                                            data-target="#editUsermodal" data-toggle="modal">Edit
                                            User
                                        </a> --}}
                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger fas fa-trash-alt" type="submit"> Hapus</button>
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

    <!-- Edit Modal -->
    @foreach ($user as $users)
        <div class="modal fade" id="editUsermodal{{ $users->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-s" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="" action="" method="" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ $users->name }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $users->email }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control"
                                        value="{{ $users->password }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" name="role_id" class="form-control" value="{{ $users->role_id }}"
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
    @endforeach
    <!-- Edit Modal -->

    {{--


    <div class="modal fade" id="editUsermodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-s" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="" action="" method="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <label>Role</label>
                            <input type="text" name="role_id" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
    --}}
@endsection
