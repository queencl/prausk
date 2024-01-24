@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->role_id == 'kantin') 
        @if (session('status'))
            <div class="alert alert-success mt-2" role="alert">
                 {{session('status')}}
            </div>
         @endif
        <div class="col-2">
            <div class="card">
                <div class="card-header">
                    MENU
                </div>
                <div class="card-body">
                
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    TAMBAH PRODUK
                </div>
                <div class="card-body">
                 <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">NAMA</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">HARGA</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="">STOK</label>
                                <input type="number" name="stock" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="">STAND</label>
                                <input type="number" name="stand" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">KATEGORI</label>
                                <select name="category_id" class="form-select">
                                    <option value="">-- Pilih Opsi --</option>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">DESKRIPSI</label>
                        <textarea name="desc" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">FOTO</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">KIRIM</button>
                    </div>
                 </form>
                </div>
            </div>
        </div>
        @endif
@endsection
