<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function pembayaran(Request $request){
    $request->validate([
            'no_transaksi' => 'required',
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required',
            'total_bayar' => 'required',
            'diterima' => 'required',
            'kembalian' => 'required',
        ]);

        $kembalian = $request->bayar - $request->subtotal;

        $transaksi = [
            'nomorTransaksi' => $request->nomorTransaksi,
            'kasir' => $request->kasir,
            'pembeli' => $request->pembeli,
            'tanggalPembelian' => date("Y-m-d"),
            'subtotal' => $request->subtotal,
            'bayar' => $request->bayar,
            'kembalian' => $kembalian
        ];


    Transaksi::create($transaksi);

    $transaksi = [
        'status' => 0,
    ];

    Transaksi::where('nomorTransaksi', $request->nomorTransaksi)
    ->update($transaksi);

    return redirect('/riwayat')->with('Success', 'Pembayaran Berhasil');
    }


    // public function riwayat() {
    //     $transaksi = Transaksi::join('transaksis', 'transaksis.nomorTransaksi', '=', 'transaksis.nomorTransaksi')
    //     ->select([
    //         'transaksis.*','transaksi_s.*'
    //     ])
    //     ->get();

    //     $data = [
    //         'transaksi' => $transaksi
    //     ];

    //     return view('transaksi.riwayat', $data);
    // }
}
