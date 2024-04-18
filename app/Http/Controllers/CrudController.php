<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Crud::all();
        // return view('Home',['users'=>$user]);
        return view('Home',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $name=$request->name;
        $email=$request->email;
        $password=$request->password;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:cruds',
            'password' => 'required|min:4',
        ]);

        $hashedPassword = Hash::make($request->password);
        Crud::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$hashedPassword,
        ]);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Crud::findOrFail($id);
        return view('affiche',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Crud::findOrFail($id);
        return view('EditPersonne',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Crud::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:cruds,email,' . $id,
            'password' => 'required|min:4',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); // Assurez-vous d'utiliser un cryptage approprié pour le mot de passe

        $user->save();

        return redirect()->route('index');
}



    /**
     * deux methode supprimer
     */

    // public function delete($id)
    // {
    //     $user = Crud::findOrFail($id);
    //     $user->delete($id);
    //     return to_route('index');
    // }

    public function delete(Crud $crud)
    {
        $crud->delete();
        return to_route('index');
    }
}
