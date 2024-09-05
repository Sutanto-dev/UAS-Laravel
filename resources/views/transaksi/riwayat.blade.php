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

        <h2 class="col d-flex justify-content-center mx-auto mb-2 mt-4 text-uppercase">Riwayat Transaksi</h2>
    </div>
    <div class="container">

        <div class="row shadow-sm p-4 mb-5 bg-body rounded">
            <h2 class="my-3">Data Riwayat Transaksi</h2>
            <table class="table align-middle mb-0 mt-2 text-center">
                <thead style="background-color: teal; color:white">
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Kasir</th>
                    <th>Pembeli</th>
                    <th>Tanggal Pembelian</th>
                    <th>Sub Total</th>
                    <th>Total Harga</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    {{-- <th>Status</th> --}}
                    {{-- <th>Qty</th> --}}
                    {{-- <th>Action</th> --}}
                </thead>
                @foreach ($transaksiAkhir as $index => $transaksi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaksi->nomorTransaksiAkhir }}</td>
                        {{-- // NOTE cara menampilkan nama adalah dengan cara innet join tabel atau menyatukan table produck dengan transaksi --}}
                        @foreach ($transaksi-> as $item)
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->total }}</td>
                        @endforeach
                        <td>{{ $transaksi->created_at }}</td>
                        {{-- <td>
                    <a class="btn btn-info btn-rounded text-white shadow-sm" href="{{ 'edit/' . $product->id }}">Edit</a>
                    <a class="btn btn-danger text-white shadow-sm" href="{{ 'delete/' . $product->id }}">Hapus</a>
            </td> --}}
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
