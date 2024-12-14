<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pengguna']=\App\Models\pengguna::latest()->paginate(10);
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
            'nama' => 'required',
            'nik' => 'required|numeric',
        ]);
        $pengguna = new \App\Models\pengguna();
        $pengguna->fill($requestData);
        $pengguna->save();
        if($pengguna){
            session()->flash('success');
        }
        else{
            session()->flash('error');
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
    public function destroy(string $id)
    {
        //
    }
}
