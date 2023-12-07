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
                                    <th>kategori</th>
                                    <th>pertanyaan</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->kategori->nama_kategori }}</td>
                                        <td>{{ $item->pertanyaan }}</td>
                                        <td>
                                            <a href="{{ route('deletetanya', ['id' => $item->id]) }}"
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
