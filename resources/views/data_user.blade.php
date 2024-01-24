@extends('layouts.admin')

@section('admin-title')
    Data Pengguna
@endsection()
@section('admin-content')
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">NOMOR</th>
                <th scope="col">NAMA</th>
                <th scope="col">NAMA PENGGUNA</th>
                <th scope="col">ROLE</th>
                <th scope="col">OPSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>
                    <a href="" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> UBAH
                    </a>
                         <!-- Button trigger invest -->
                         <button type="button" class="btn btn-danger" data-bs-toggle="invest" data-bs-target="#hapusUser-{{$user->id}}">
                            <i class="bi bi-trash"></i> HAPUS
                        </button>
                        
                        <!-- invest -->
                        <div class="invest fade" id="hapusUser-{{$user->id}}" tabindex="-1" aria-labelledby="exampleinvestLabel" aria-hidden="true">
                            <div class="invest-dialog">
                            <div class="invest-content">
                                <div class="invest-header">
                                <h1 class="invest-title fs-5" id="exampleinvestLabel" style="font-weight: bold;">
                                    HAPUS   DATA
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="invest" aria-label="Close"></button>
                                </div>
                                <div class="invest-body">
                                    Anda Yakin Ingin Menghapus Data Ini?   
                                </div>
                                <div class="invest-footer">
                                    <form action="{{route('user.destroy',['user' => $user->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary">HAPUS</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection