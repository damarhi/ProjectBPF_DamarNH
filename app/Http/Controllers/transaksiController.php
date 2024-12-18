<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Models\User;
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
        if (request()->filled( 'q')) {
            $data = [
                'transaksi' => transaksi::search(request('q'))->paginate(10),
                'listProduk' => \App\Models\produk::all(),
                'listPengguna' => \App\Models\User::all(),
            ];
        }else{
            $data = [
                'transaksi' => \App\Models\transaksi::latest()->paginate(10),
                'listProduk' => \App\Models\produk::all(),
                'listPengguna' => \App\Models\User::all(),
            ];
        }


        return view('transaksi.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listProduk['listProduk'] = produk::all();
        $listPengguna ['listPengguna'] = User::all();
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
            'user_id'=>'required|numeric',
            'total_harga'=> 'required|numeric|',
            'jumlah_produk'=> 'required|numeric|',
        ]);

        $produk = \App\Models\produk::find($requestData['produk_id']);

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
            session()->flash('success','Transaksi Berhasil');
        }
        else{
            session()->flash('error', 'Terjadi Kesalahan, Gagal Melakukan Transaksi');
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
            session()->flash('success','Data Berhasil Dihapus');
        }
        else{
            session()->flash('error','Data Gagal Dihapus');
        }

        return back();
    }
}
