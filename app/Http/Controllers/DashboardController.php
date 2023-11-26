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
            'tickets' => Tickets::where('user_id', auth()->user()->id)->get(),
            'staffs' => Staff::where('user_id', auth()->user()->id)->get()
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
    public function edit($id)
    {
        $tickets = Tickets::find($id);
        return view('dashboard.tickets.edit', [ 
            'title' => 'Edit tiket',
            'tickets' => $tickets,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $validasi = $request->validate([
            'nama_tiket' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
    
        $ticket = Tickets::findOrFail($id);
    
        $ticket->nama_tiket = $validasi['nama_tiket'];
        $ticket->deskripsi = $validasi['deskripsi'];
        $ticket->harga = $validasi['harga'];
        $ticket->user_id = auth()->user()->id; 
    
        $ticket->save();
    
        return redirect('/dashboard')->with('success', 'Ticket has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Tickets::findOrFail($id);
        $ticket->delete();
        return redirect('/dashboard')->with('success', 'Post has been deleted!');
    }


    public function createStaff(){
        return view('dashboard.staff.create', [
            'title' => 'Register Staff',
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

    public function editStaff($id){
        $staff = Staff::find($id);
        return view('dashboard.staff.edit', [ 
            'title' => 'Edit Staff',
            'staff' => $staff,
        ]);
    }

    public function updateStaff(Request $request, $id){
        $validasi = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'no_hp' => 'required|numeric',
        ]);
    
        $staff = Staff::findOrFail($id);
    
        $staff->nama = $validasi['nama'];
        $staff->email = $validasi['email'];
        // $staff->password = $validasi['password'];
        $staff->no_hp = $validasi['no_hp'];
        $staff->user_id = auth()->user()->id; 
    
        $staff->save();
    
        return redirect('/dashboard')->with('success', 'Ticket has been updated!');
    }
}
