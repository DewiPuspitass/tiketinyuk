<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index',[
            'title' => 'Dashboard',
            'tickets' => Tickets::where('user_id', auth()->user()->id)->get()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tickets.create', [
            'title' => 'Buat Tiket',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $request->validate([
            'nama_tiket' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required', 'max:255',
        ]);

        $create['user_id'] = auth()->user()->id;


        Tickets::create($create);

        return redirect('/dashboard')->with('success', 'tiket baru sudah dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets = Tickets::find($id);
        // dd($tickets);
        return view('dashboard.tickets.detail', [
            "title" => "Detail Tiket",
            "tickets" => $tickets

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $tickets)
    {
        //
    }


    public function createStaff(){
        return view('dashboard.staff.create', [
            'title' => 'Buat Tiket',
        ]);
    }

    public function storeStaff(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns',
            'no_hp' => ['required', 'min:11', 'max:255'],
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        Staff::create($validatedData);
        // return request()->all();

        // $request->session()->flash('success', 'Registeration successfull! Please login');
        return redirect('/dashboard')->with('success', 'Data Staff berhasil di tambahkan');
    }
}
