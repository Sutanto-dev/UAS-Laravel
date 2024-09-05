@extends('layouts.app')
@section('content')
<h1 class="text-center my-4">Form Edit Data Produk</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Edit Data</div>
            <div class="card-body">
                <form method="POST" action="{{ url('update/'. $product->id) }}">
                    @csrf
                    @method('put')

                    <div class="form-group row">
                        <label class="col-md-2 text-md-right">Nama Product</label>
                        <div class="col-md-8">
                            <input type="text" name="nama" placeholder="masukan nama product" id="nama" value="{{ $product->nama }}" class="@error('nama') is-invalid @enderror form-control">

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
                            <select name="status" id="status" class="@error('status') is-invalid @enderror form-control">
                                <option value="1" {{ $product->status ? 'selected' : '' }}>Tersedia</option>
                                <option value="0" {{ !$product->status ? 'selected' : '' }}>Tidak tersedia</option>
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
                            <input type="text" name="stok" placeholder="masukan nama stok" id="stok" value="{{ $product->stok }}" class="@error('stok') is-invalid @enderror form-control">

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
                            <input type="text" name="harga" placeholder="masukan nama harga" id="harga" value="{{ $product->harga }}" class="@error('harga') is-invalid @enderror form-control">

                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Update Data</button>
                    <a href="{{ '/product' }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
