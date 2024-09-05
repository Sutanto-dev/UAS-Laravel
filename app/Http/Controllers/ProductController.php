<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::where('status', true)->get();
        $data = [
            "productData" => $product,
        ];
        return view('product.index', $data);
    }

    public function getstatus($value)
    {
        return $value ? 'Tersedia' : 'Tidak tersedia';
    }

    public function showDetail(Request $request)
    {
        $productId = $request->input('product_id');
        $selectedProduct = null;

        if ($productId) {
            $selectedProduct = Product::find($productId);
        }

        return view('transaksi.', compact('selectedProduct'));
    }

    public function deleteData($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }

    public function create()
    {
        return view('product.create');
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required',
        'status' => 'required',
        'stok' => 'required|numeric',
        'harga' => 'required|numeric',
    ]);

    $product = new Product();
    $product->nama = $validatedData['nama'];
    $product->status = $validatedData['status'];
    $product->stok = $validatedData['stok'];
    $product->harga = $validatedData['harga'];
    $product->save();

    return redirect()->route('product.index')->with('success', 'Data produk berhasil ditambahkan!');
}

    public function edit($id)
    {
        $product = Product::find($id);
        $data = [
            'product' => $product
        ];
        return view('product.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required'],
            'status' => ['required'],
            'stok' => ['required', 'numeric'],
            'harga' => ['required', 'numeric']
        ]);

        $product = Product::find($id);
        $product->nama = $request->input('nama');
        $product->status = $request->input('status');
        $product->stok = $request->input('stok');
        $product->harga = $request->input('harga');
        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();

        return redirect('/product');
    }
    public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $product = Product::where('status', true)
        ->where(function ($query) use ($searchTerm) {
            $query->where('nama', 'like', '%' . $searchTerm . '%')
                ->orWhere('harga', 'like', '%' . $searchTerm . '%');
        })
        ->get();

    $data = [
        "productData" => $product,
    ];

    return view('product.index', $data);
}
}
