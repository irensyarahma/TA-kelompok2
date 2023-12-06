@extends('master')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-app bg-info" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-users"></i> Tambah Users
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}
                                        </td>
                                        <td>
                                            <a class="btn btn-app bg-warning" data-toggle="modal"
                                                data-target="#EditModal{{ $item->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('delete', ['id' => $item->id]) }}"
                                                class="btn btn-app bg-danger">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
<!-- Modal -->
<div class="modal" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Users</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Isi modal di sini -->
                <form method="POST" action="{{ route('adduser') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                    </div>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

@foreach ($data as $item)
    <!-- Modal Edit -->
    <div class="modal" id="EditModal{{ $item->id }}">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body">
                    <!-- Isi modal di sini -->
                    <form method="POST" action="{{ route('edituser', ['id' => $item->id]) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="editName{{ $item->id }}">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    id="editName{{ $item->id }}" placeholder="Enter Name"
                                    value="{{ $item->name }}">
                            </div>
                            <div class="form-group">
                                <label for="editEmail{{ $item->id }}">Email address</label>
                                <input type="email" name="email" class="form-control"
                                    id="editEmail{{ $item->id }}" placeholder="Enter email"
                                    value="{{ $item->email }}">
                            </div>
                        </div>
                </div>

                <!-- Footer Modal -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Edit -->
@endforeach
