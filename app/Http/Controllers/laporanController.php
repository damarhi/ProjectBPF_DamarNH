<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $models = transaksi::query();
        if ($request->filled('tanggal_awal')) {
            $models->whereDate('created_at', '>=', $request->tanggal_transaksi);
        }
        if ($request->filled('tanggal_akhir')) {
            $models->whereDate('created_at', '<=', $request->tanggal_transaksi);
        }
        if ($request->filled('transaksi_id')) {
            $models->where('transaksi_id', $request->transaksi_id);
        }


        $data['models'] = $models->latest()->get();
        return view('laporan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPengguna']=\App\Models\User::orderBy('name','asc')->get();
        $data['listProduk']=\App\Models\produk::orderBy('jenis','asc')->pluck('jenis','id');
        $data['listTransaksi']=\App\Models\transaksi::orderBY('id','asc')->get();
        return view('laporan.create', $data);
    }

}
