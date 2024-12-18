<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk['produk']= \App\Models\produk::latest()->paginate(10);
        return view('produk.index',$produk);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'harga_asli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok_sekarang' => 'required|numeric',
            'stok_terjual' => 'nullable|numeric',
            'jenis' => 'required',
            'foto' => 'nullable|image', // Pastikan ini memiliki tipe file
        ]);

        $produk = new \App\Models\produk; // membuat objek kosong di variabel model
        $produk->fill($requestData); // mengisi var model dengan data yang sudah divalidasi requestData

        // Hanya jika file foto diunggah, simpan path-nya
        $produk->foto = $request->file('foto')->store('produk','public');

        // Set stok_terjual default ke 0 jika null
        $produk->stok_terjual = $requestData['stok_terjual'] ?? 0;

        $produk->save();
        if($produk){
            session()->flash('success','Data Berhasil Ditambahkan');
        }
        else{
            session()->flash('error','Data Gagal Ditambahkan');
        }

        return back();
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
        $data['produk']= \App\Models\produk::findOrFail($id);
        return view('produk.modal_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'stok_sekarang' => 'nullable|numeric',
            'stok_terjual' => 'nullable|numeric',
            'harga_asli' => 'nullable|numeric',
            'harga_jual' => 'nullable|numeric',
        ]);
        $produk = \App\Models\produk::findOrFail($id);
        $produk->fill($requestData);
        $produk->save();
        if($produk){
            session()->flash('success','Data Berhasil Diubah');
        }
        else{
            session()->flash('error','Data Gagal Diubah');
        }

        // flash('Data berhasil di simpan')->success();
        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = \App\Models\produk::findOrFail($id);

        $produk->delete();
        // flash('Data sudah dihapus')->success();

        if($produk){
            session()->flash('success','Data Berhasil Dihapus');
        }
        else{
            session()->flash('error','Data Gagal Dihapus');
        }

        return back();
    }
}
