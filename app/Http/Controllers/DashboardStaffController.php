<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Tickets;
use App\Models\User;
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
        $userId = 1;
        $staff = User::find($userId);
        $tickets = $staff->tickets;
        
        return view('dashboard.staff.index',[
            'title' => 'Dashboard',
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pembelian()
    {
        return view("dashboard.staff.pembelian.index", [
            'title' => 'Pembelian Tiket',
            'tickets' => Tickets::all(),
        ]);
    }

    public function getHarga(){
        $harga = Tickets::where('id', $tiketId)->value('harga');
        return response()->json(['harga' => $harga]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }

    public function login(){
        return view('login.index_staff',[
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request){
    //     $email = $request->input('email');
    //     $password = $request->input('password');
        
    //     // Ambil data pengguna berdasarkan email
    //     $user = DB::table('staffAcc')->where('email', $email)->first();
        
    //     if ($user && password_verify($password, $user->password)) {
    //         session(['user_id' => $user->id]);
    //         return redirect('/dashboardStaff'); // Redirect ke halaman setelah login
    //     } else {
    //         // Autentikasi gagal
    //         return redirect('/login')->with('error', 'Email atau password salah');
    // }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('staff')->attempt($credentials)) {
            // Jika login berhasil
            return redirect()->intended('/dashboardStaff'); // Ganti '/dashboard' dengan rute setelah login sukses
        } else {
            // Jika login gagal
            return back()->withErrors(['email' => 'Invalid credentials']); // Tampilkan pesan error
        }
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
