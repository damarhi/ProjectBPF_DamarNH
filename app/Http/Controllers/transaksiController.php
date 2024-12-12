<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'transaksi' => \App\Models\transaksi::latest()->paginate(10),
            'listProduk' => \App\Models\produk::all(),
            'listPengguna' => \App\Models\pengguna::all(),
        ];

        return view('transaksi.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listProduk['listProduk'] = produk::all();
        $listPengguna ['listPengguna'] = pengguna::all();
        return view('transaksi.create', $listProduk, $listPengguna);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request-> validate([
            'tanggal_transaksi' => 'required|date',
            'produk_id' => 'required|numeric',
            'pengguna_id'=>'required|numeric',
            'total_harga'=> 'required|numeric|',
            'jumlah_produk'=> 'required|numeric|',
        ]);

        $produk = \App\Models\Produk::find($requestData['produk_id']);

        if (!$produk) {
            return redirect()->back()->withErrors(['produk_id' => 'Produk tidak ditemukan.'])->withInput();
        }

        $stok_sekarang = $produk->stok_sekarang - $requestData['jumlah_produk'] ;
        $stok_terjual = $produk->stok_terjual + $requestData['jumlah_produk'];
        $produk->stok_sekarang = $stok_sekarang;
        $produk->stok_terjual = $stok_terjual;
        $produk->save();

        $transaksi = new \App\Models\transaksi();
        $transaksi->fill($requestData);
        $transaksi->save();

        if($transaksi){
            session()->flash('success');
        }
        else{
            session()->flash('error');
        }
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = \App\Models\transaksi::findOrFail($id);
        $transaksi->delete();
        // flash('Data sudah dihapus')->success();

        if($transaksi){
            session()->flash('success');
        }
        else{
            session()->flash('error');
        }

        return back();
    }
}
