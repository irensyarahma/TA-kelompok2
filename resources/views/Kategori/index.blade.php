@extends('master')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-app bg-info" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-bars"></i> Tambah Kategori
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>
                                            <a class="btn btn-app bg-warning" data-toggle="modal"
                                                data-target="#EditModal{{ $item->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('deletekategori', ['id' => $item->id]) }}"
                                                class="btn btn-app bg-danger">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--Modal Tambah Kategori-->
<div class="modal" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Isi modal di sini -->
                <form method="POST" action="{{ route('addkategori') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control"
                                placeholder="Enter kategori">
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

<!--Modal Edit Kategori-->
@foreach ($data as $item)
    <!-- Modal Edit -->
    <div class="modal" id="EditModal{{ $item->id }}">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body">
                    <!-- Isi modal di sini -->
                    <form method="POST" action="{{ route('editkategori', ['id' => $item->id]) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="editKategori{{ $item->id }}">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control"
                                    id="editName{{ $item->id }}" placeholder="Enter Kategori"
                                    value="{{ $item->nama_kategori }}">
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
