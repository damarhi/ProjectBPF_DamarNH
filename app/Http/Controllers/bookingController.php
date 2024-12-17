<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\produk;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\booking::latest();

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $data = [
            'booking' => $query->paginate(10),
            'listProduk' => \App\Models\produk::all(),
            'listPengguna' => \App\Models\User::all(),
        ];
        return view('booking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listProduk['listProduk'] = produk::all();
        $listPengguna ['listPengguna'] = User::all();
        return view('booking.create', $listProduk, $listPengguna);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request-> validate([
            'tanggal_booking' => 'required|date',
            'produk_id' => 'required|numeric',
            'user_id'=>'required|numeric',
            'total_harga'=> 'required|numeric|',
            'jumlah_produk'=> 'required|numeric|',
        ]);
        $status="Tunggu";


        $produk = \App\Models\Produk::find($requestData['produk_id']);

        if (!$produk) {
            return redirect()->back()->withErrors(['produk_id' => 'Produk tidak ditemukan.'])->withInput();
        }

        $booking = new \App\Models\booking();
        $booking->fill($requestData);
        $booking->status=$status;
        $booking->save();

        if($booking){
            session()->flash('success');
        }
        else{
            session()->flash('error');
        }

        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['booking']= \App\Models\booking::findOrFail($id);
        return view('booking.modal_show',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'status' => 'required|in:Disetujui,Ditolak,Tunggu,Selesai',
            'deskripsi' => 'required',
        ]);

        $booking = \App\Models\booking::findOrFail($id);
        $booking->fill($requestData);

        // Jika status adalah Disetujui, update stok
        if ($requestData['status'] === 'Disetujui') {
            $produk = $booking->produk; // Menggunakan relasi produk dari booking

            if (!$produk) {
                return redirect()->back()->withErrors(['produk_id' => 'Produk tidak ditemukan.'])->withInput();
            }

            // Validasi stok cukup
            if ($produk->stok_sekarang < $booking->jumlah_produk) {
                return redirect()->back()->withErrors(['stok' => 'Stok tidak mencukupi untuk proses ini.'])->withInput();
            }

            // Update stok produk
            $produk->stok_sekarang -= $booking->jumlah_produk;
            $produk->stok_terjual += $booking->jumlah_produk;
            $produk->save();
        }
        // Jika status adalah Selesai, pindahkan data ke tabel transaksi
        elseif ($requestData['status'] === 'Selesai') {
            // Buat entri baru di tabel transaksi
            $transaksi = new \App\Models\transaksi();
            $transaksi->fill([
                'produk_id' => $booking->produk_id,
                'user_id' => $booking->user_id,
                'jumlah_produk' => $booking->jumlah_produk,
                'total_harga' => $booking->total_harga,
                'tanggal_transaksi' => now(), // Atur waktu transaksi
            ]);

            $transaksi->save();
        }

        $booking->save();

        if($booking){
            session()->flash('success');
        }
        else{
            session()->flash('error');
        }

        return redirect('/booking');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking =booking::findOrFail($id);
        if($booking->status=='Disetujui'){
            session()->flash('error');
            return back();
        }
        $booking->delete();
        // flash('Data sudah dihapus')->success();
        return back();
    }
}
