<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Tickets;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffId = Auth::guard('staff')->user()->user_id;
        $user = User::find($staffId);
        $tickets = $user->tickets;

        // dd($tickets = $user->tickets);
        $pembelian = Pembelian::where('staff_id', $staffId)->get();
       
        return view('dashboard.staff.index',[
            'title' => 'Dashboard',
            'tickets' => $tickets,
            'pembelian' => $pembelian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pembelian()
    {
        $staffId = Auth::guard('staff')->user()->user_id;
        $user = User::find($staffId);
        $tickets = $user->tickets;

        return view("dashboard.staff.pembelian.index", [
            'title' => 'Pembelian Tiket',
            'tickets' => $tickets,
        ]);
    }

    public function hargaTiket(Request $request)
    {
        $jenisTiket = $request->input('jenis_tiket');
        $jumlahTiket = $request->input('jumlah_tiket');
        
        $tiket = Tickets::where('id', $jenisTiket)->first();
        
        if ($tiket) {
            $namaWisatawan = $request->input('nama_wisatawan');
            $harga = $tiket->harga;
            $totalHarga = $harga * $jumlahTiket;

            return view('dashboard.staff.pembelian.harga_tiket')
                ->with('harga', $harga)
                ->with('nama_wisatawan', $namaWisatawan)
                ->with('jenisTiket', $jenisTiket)
                ->with('jumlahTiket', $jumlahTiket)
                ->with('totalHarga', $totalHarga);
        } else {
            return "Tiket $jenisTiket tidak ditemukan";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staffId = Auth::guard('staff')->user()->id;
        $create = $request->validate([
            'nama_wisatawan' => 'required',
            'jenis_tiket' => 'required',
            'total_harga' => 'required|numeric',
            'jenis_pembayaran' => 'required',
        ]);
        
        $pembelian = new Pembelian();
        $pembelian->nama_wisatawan = $create['nama_wisatawan'];
        $pembelian->ticket_id = $create['jenis_tiket'];
        $pembelian->total = $create['total_harga'];
        $pembelian->staff_id = $staffId;

        $pembelian->save();

        return redirect('/dashboardStaff')->with('success', 'Tiket baru sudah dibuat');
    }

    public function login(){
        return view('login.index_staff',[
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('staff')->attempt($credentials)) {
            return redirect()->intended('/dashboardStaff'); 
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/loginStaff');
    }
}
