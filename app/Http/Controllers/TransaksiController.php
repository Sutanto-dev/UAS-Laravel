<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\transaksi;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        $products = Product::all();
        $data = [
            'transaksis' => $transaksis,
            'products' => $products,
        ];
        return view('transaksi.index', $data, compact('transaksis'));
    }

    public function dataTransaksi(){
        // SECTION PERUBAHAN TRANSAKSI
        $transaksi = transaksi::join('products', 'transaksis.product_id', '=', 'products.id')
        ->select([
            'transaksis.*', 'products.*'
        ])
        ->where('transaksis.status', '1')
        ->get();

        $datatr =[
            "transaksiData" => $transaksi
        ];

        $product = product::all()
        ->where('status', true);

        $data =[
            "productData" => $product
        ];

        return view('transaksi.index', $data, $datatr);
    }

    public function buatTransaksi(Request $request){
        $product = product::all();

        // menyatukan table kejangan dengan product dengan inner join
        $selectedProduct = Keranjang::join('products', 'keranjangs.product_id', '=', 'products.id')
        ->select([
            'keranjangs.id as keranjangs_id', 'products.*'
        ])
        ->where('status', '1')
        ->get();

        $banyakDataTransaksi = Transaksi::count();

        $data =[
            "productData" => $product,
            "selectedProduct" => $selectedProduct,
            "transaksiid" => $banyakDataTransaksi,
        ];

        return view('transaksi.buat', $data);

        // return $this->showDetail($request);
    }

    public function simpanKerajang(Request $request) {
        $request->validate([
            'product_id' => 'required|unique:keranjangs',
        ]);

        $barang = $request->input('product_id');

        Keranjang::create([
            'product_id' => $barang,
        ]);

        return redirect('/transaksi/buatTransaksi');
    }

    public function checkout(Request $request) {
        $request->validate([
            'product_id' => 'required|unique:keranjangs',
        ]);

        $barang = $request->input('product_id');

        Keranjang::create([
            'product_id' => $barang,
        ]);

        return redirect('/transaksi/checkout');
    }

    public function hapusKerajang($id) {

        Keranjang::find($id)->delete();

        return redirect('/transaksi/buatTransaksi');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nomorTransaksi[]' => 'required',
        //     'product_id[]' => 'required',
        //     'qty[]' => 'required|numeric',
        //     // 'total' => 'required','numeric'
        // ]);

        for ($i=0; $i < count($request->product_id); $i++) {
            $product = Product::find($request->product_id[$i]);

            $total_harga = $request->qty[$i] * $product->harga;
            $kembalian = $total_harga - $request->bayar;

            $existingTransaction = Transaksi::where('product_id', $request->product_id[$i])
            ->where('nomorTransaksi', $request->nomorTransaksi[$i])
            ->first();

            if ($existingTransaction) {
                $existingTransaction->qty += $request->qty[$i];
                $existingTransaction->total += $total_harga;
                $existingTransaction->save();
            } else {
                $transaksiData = [
                        'nomorTransaksi' => $request->nomorTransaksi[$i],
                        'product_id' => $product->id,
                        'status' => 1,
                        'tgl_pembelian' => $request->tgl_pembelian,
                        'qty' => $request->qty[$i],
                        'total' => $total_harga,
                    ];

                Transaksi::create($transaksiData);
            }

            $product = Product::findOrFail($request->product_id[$i]);
            $product->stok -= $request->qty[$i];
            $product->save();
        }

        Keranjang::getQuery()->delete();

        return redirect()->to('/transaksi')->with('Success', 'Transaksi Berhasil!');
    }
    // !SECTION PERUBAHAN TRANSAKSI

    public function showDetail(Request $request)
    {
        $product = product::all();

        $data =[
            "productData" => $product
        ];

        $productId = $request->input('product_id');

        $selectedProduct = null;

        if ($productId) {
            $selectedProduct = Product::find($productId);
        }

        return view('transaksi.buat', compact('selectedProduct'), $data);
    }

// public function showTransaksi()
// {
//     // Buat objek ProductController
//     $productController = new ProductController();

//     // Panggil metode getProductDetail() dari ProductController
//     $selectedProduct = $productController->getProductDetail($productId);

//     return view('transaksi', compact('selectedProduct'));
// }

}
