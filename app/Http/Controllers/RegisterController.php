<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function indexManager(){
        return view('register.index_manager', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns',
            'no_hp' => ['required', 'min:11', 'max:255'],
            'nama_wisata' => 'required|max:255',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // return request()->all();

        // $request->session()->flash('success', 'Registeration successfull! Please login');
        return redirect('/login')->with('success', 'Registeration successfull! Please login');
    }
}
