<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\booking;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
            'produk' => \App\Models\produk::find($request->get('produk_id')),
        ];
        return view('home', $data);
    }

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


        $produk = \App\Models\produk::find($requestData['produk_id']);

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

        return back();
    }

    public function destroy(string $id)
    {
         // Cek apakah data ada
         $booking = Booking::find($id);

         if (!$booking) {
             session()->flash('error', 'Data tidak ditemukan.');
             return back();
         }

         // Cek status
         if ($booking->status === 'Disetujui') {
             session()->flash('error', 'Data tidak dapat dihapus karena sudah disetujui.');
             return back();
         }

         // Hapus data
         $booking->delete();
         session()->flash('success', 'Data berhasil dihapus.');
         return back();
     }

    public function dashboard(): View
    {

        $data['booking'] = \App\Models\booking::latest()->get();
        return view('dashboard',$data);
    }
}
