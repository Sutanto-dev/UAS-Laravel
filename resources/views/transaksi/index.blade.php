@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- @if ($message = Session::has('Success'))
    <script>
       Swal.fire('{{ $message }}');
    </script>
    @endif --}}
        @if (Session::has('Success'))
            <p class="alert alert-success mb-0">{{ Session::get('Success') }}</p>
        @endif

        <h2 class="col d-flex justify-content-center mx-auto mb-2 mt-4 text-uppercase">Daftar Transaksi</h2>
    </div>
    <div class="container">

        <div class="row shadow-sm p-4 mb-5 bg-body rounded">
            <div class="col d-flex mx-auto mb-3 p-0">
                <a class="btn btn-success text-white shadow-sm" href="{{ '/transaksi/buatTransaksi' }}">
                    <ion-icon name="cart-outline"></ion-icon> Tambah Ke Keranjang
                </a><br>
            </div>
            <h2 class="my-3">Data barang</h2>
            <table class="table align-middle mb-0 mt-2 text-center">
                <thead style="background-color: teal; color:white">
                    <th>No</th>
                    {{-- <th>No Transaksi</th> --}}
                    <th>Nama</th>
                    <th>qty</th>
                    <th>Total harga</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                    {{-- <th>Qty</th> --}}
                    {{-- <th>Action</th> --}}
                </thead>
                @foreach ($transaksiData as $index => $transaksi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        {{-- <td>{{ $transaksi->nomorTransaksi }}</td> --}}
                        {{-- // NOTE cara menampilkan nama adalah dengan cara innet join tabel atau menyatukan table produck dengan transaksi --}}
                        <td>{{ $transaksi->nama }}</td>
                        <td>{{ $transaksi->qty }}</td>
                        <td>{{ $transaksi->total }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                        <td>{{ $transaksi->status ? 'Sudah Di Bayar' : 'Belum Di Bayar' }}</td>
                        {{-- <td>
                    <a class="btn btn-info btn-rounded text-white shadow-sm" href="{{ 'edit/' . $product->id }}">Edit</a>
                    <a class="btn btn-danger text-white shadow-sm" href="{{ 'delete/' . $product->id }}">Hapus</a>
            </td> --}}
                    </tr>
                @endforeach
            </table>
            @isset($transaksi)
                <form action="/transaksi/pembayaran" method="POST">
                    <div class="card p-4 position-relative mt-4">
                        <h3>Form Pembayaran</h3>
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label for="">No transaksi</label>
                                {{-- // NOTE: message error nya di ubah jadi di form biar garibet pake max  --}}
                                <input class="form-control" type="number" value="{{ $transaksi->nomorTransaksi }}"
                                    name="nomorTransaksi" id="nomorTransaksi" readonly required>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="">Nama Kasir</label>
                                {{-- // NOTE: message error nya di ubah jadi di form biar garibet pake max  --}}
                                <input class="form-control" type="text" value="{{ Auth::user()->name }}" name="kasir"
                                    id="qty" readonly required>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="">Pembeli</label>
                                {{-- // NOTE: message error nya di ubah jadi di form biar garibet pake max  --}}
                                <input class="form-control" type="text" placeholder="masukan nama pembeli" name="pembeli"
                                    id="pembeli" required>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="">Pembayaran</label>
                                {{-- // NOTE: message error nya di ubah jadi di form biar garibet pake max  --}}
                                <input class="form-control" type="text" placeholder="masukan nama Pembayaran" name="bayar"
                                    id="bayar" required>
                            </div>
                            <hr class="mt-5">
                            <div class="form-group row mt-3">
                                <label for="inputPassword" class="col-2 col-form-label">Subtotal Harga :</label>
                                <div class="col-3">
                                    <input class="form-control" type="number" value="{{ $transaksi->sum('total') }}"
                                        name="subtotal" id="subtotal" readonly required>
                                </div>
                                <div class="col-7 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endisset
        </div>
    </div>
@endsection
