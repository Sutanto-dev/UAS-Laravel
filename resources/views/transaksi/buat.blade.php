@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="col d-flex justify-content-center mx-auto mb-3 mt-3 text-uppercase">Menu Keranjang</h2>
        <div class="row">
            {{-- <div class="col d-flex mx-auto mb-3 p-0">
            <a class="btn btn-success text-white shadow-sm" href="{{ '/loan'}}">Kembali</a> <br>
        </div> --}}
            <table>
                {{-- // NOTE menambah data untuk memasukan kedalam kerajang --}}
                <form action="{{ route('simpan.kerajang') }}" method="POST">
                    @csrf
                    <tr>
                        <td>
                            {{-- <label for="">Pilih Produk</label> --}}
                            <select name="product_id" class="form-control" name="resoureceName" required>
                                <option>Pilih Produk</option>
                                @foreach ($productData as $index => $product)
                                    <option value="{{ $product->id }}"> {{ $product->nama }} </option>
                                @endforeach
                            </select>
                            <br>
                            @error('product_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-success mt-2" type="submit">
                                @if (count($selectedProduct) > 0)
                                    Tambah
                                @else
                                    Pilih
                                @endif
                            </button>
                        </td>
                    </tr>
                    {{-- <tr>
            <td>
                <label for="">Nomor Transaksi</label>
                <input class="form-control" type="text" name="noTransaksi" id="" value="{{ "01035230001" + 1 }}" readonly>

            </td>
        </tr> --}}
                </form>

                <br>

                <div id="productDetail">
                    <!-- Tempatkan detail produk yang akan ditampilkan di sini -->
                    {{-- count untuk menghitung banyak data --}}
                    @if (count($selectedProduct) > 0)
                        <form action="{{ '/store' }}" method="POST">
                            @csrf
                            {{-- @if (Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error')}}</p>
            @endif --}}
                            <table>
                                <div class="card p-4 position-relative mt-4">
                                    {{-- <h3>Detail Pesanan</h3> --}}
                                    {{-- // NOTE agar form bertambah maka gunakan looping foreach --}}
                                    @foreach ($selectedProduct as $item)
                                        <br>

                                        <div class="d-flex justify-content-between">
                                            <h5>Pesanan {{ $item->nama }}</h5>
                                            <a href="/transaksi/{{ $item->keranjangs_id }}/hapusKeranjang"
                                                class="btn btn-danger">Hapus</a>
                                        </div>

                                        <div class="row">
                                            {{-- // NOTE NOMOR TRANSAKSI di hidden --}}
                                            <input class="form-control" type="hidden" name="nomorTransaksi[]"
                                                id="" value="{{ '060623000' . $transaksiid + 1 }}" readonly
                                                required>
                                            <div class="col mt-2">
                                                <label for="">Nama Produk</label>
                                                <input class="form-control" type="text" id=""
                                                    value="{{ $item->nama }}" readonly required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mt-2">
                                                <label for="">ID Produk</label>
                                                <input class="form-control" type="text" name="product_id[]"
                                                    id="" value="{{ $item->id }}" readonly required>
                                            </div>

                                            <div class="col mt-2">
                                                <label for="">Harga Produk</label>
                                                <input class="form-control" type="text" pattern="[0-9]*"
                                                    inputmode="numeric" name="harga[]" id=""
                                                    value="{{ $item->harga }}" readonly required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mt-2">
                                                <label for="">Qty</label>
                                                {{-- // NOTE: message error nya di ubah jadi di form biar garibet pake max  --}}
                                                <input class="form-control" type="number" max="{{ $item->stok }}"
                                                    name="qty[]" id="qty" placeholder="Masukkan Jumlah Barang"
                                                    onchange="calculateTotal()" required>
                                            </div>
                                            {{-- <div class="col mt-2">
                                        <label for="">Total Harga</label>
                                        <input class="form-control" type="text" name="total" id="" value="{{ $selectedProduct->harga }}">
                                    </div> --}}
                                        </div>

                                        <br>
                                    @endforeach
                                    <div class="col-4 mt-3">
                                        <button class="btn btn-success" type="submit">Pesan</button>
                                        {{-- <a class="btn btn-success text-white shadow-sm" href="{{ '/transaksi/checkout' }}">
                                            <ion-icon name="cart-outline"></ion-icon> Checkout
                                        </a><br> --}}
                                    </div>
                                </div>
                            </table>
                        </form>
                        <!-- Tampilkan informasi lainnya sesuai kebutuhan -->
                    @endif
                </div>
        </div>
        </table>

    </div>
    </div>
    <br>
@endsection
