<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
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
        ];
        return view('home', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(): View
    {
        return view('dashboard');
    }
}
