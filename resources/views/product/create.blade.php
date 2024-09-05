@extends('layouts.app')
@section('content')
<h1 class="text-center my-4">Form Tambah Data Produk</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Tambah Data</div>
            <div class="card-body">
                <form method="post" action="{{ route('products.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label class="col-md-2 text-md-right">Nama Product</label>
                        <div class="col-md-8">
                            <input type="text" name="nama" placeholder="masukkan nama produk" class="@error('nama') is-invalid @enderror form-control">

                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label class="col-md-2 text-md-right">Status</label>
                        <div class="col-md-8">
                            <select name="status" class="@error('status') is-invalid @enderror form-control">
                                <option value="1">Tersedia</option>
                                <option value="0">Tidak tersedia</option>
                            </select>

                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label class="col-md-2 text-md-right">Stok</label>
                        <div class="col-md-8">
                            <input type="text" name="stok" placeholder="masukkan stok produk" class="@error('stok') is-invalid @enderror form-control">

                            @error('stok')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label class="col-md-2 text-md-right">Harga</label>
                        <div class="col-md-8">
                            <input type="text" name="harga" placeholder="masukkan harga produk" class="@error('harga') is-invalid @enderror form-control">

                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success"><ion-icon name="cart-outline"></ion-icon> Tambah Data</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
