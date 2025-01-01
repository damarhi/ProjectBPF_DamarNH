<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['listPengguna']= User::latest()->paginate(10);
        if (request()->filled( 'q')) {
            $data = [
                'listPengguna' => User::search(request('q'))->paginate(10),
            ];
        }else{
            $data['listPengguna']= User::latest()->paginate(10);
        }

        return view('pengguna.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request-> validate([
            'name' => 'required',
            'nik' => 'required|numeric',
            'email' => 'nullable',
            'password' => 'nullable',

        ]);

        $pengguna = new User();
        $pengguna->role = 'user';
        $pengguna->fill($requestData);
        $pengguna->save();
        if($pengguna){
            session()->flash('success','Berhasil Menambah Data Pelanggan');
        }
        else{
            session()->flash('error','Gagal Menambah Data Pelanggan');
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
        $data['listPengguna']= \App\Models\User::findOrFail($id);
        return view('pengguna.modal_create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request-> validate([
            'name' => 'required',
            'nik' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $pengguna = User::findOrFail($id);
        $pengguna->role = 'user';
        $pengguna->password = Hash::make($request['password']);
        $pengguna->fill($requestData);
        $pengguna->update();
        if($pengguna){
            session()->flash('success','Berhasil Mengubah Data Pelanggan');
        }
        else{
            session()->flash('error','Gagal Mengubah Data Pelanggan');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $pengguna = \App\Models\User::findOrFail($id);
        if($pengguna->transaksi->count()>=1){
            session()->flash('error','Gagal Menghapus Karena Pengguna Sudah Melakukan Transaksi');
            return back();
        }

        if($pengguna->booking->count()>=1){
            session()->flash('error', 'Gagal Menghapus Karena Pengguna Sudah Melakukan Booking');
            return back();
        }

        $pengguna->delete();
        // flash('Data sudah dihapus')->success();

        if($pengguna){
            session()->flash('success','Berhasil Menghapus');
        }

        return back();
    }
}
