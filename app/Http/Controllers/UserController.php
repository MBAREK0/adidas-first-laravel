<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function list_Users(){
        $Users= User::all();
        return view('Users.index', compact('Users'));
    }
    public function create(){
        return view('Users.create');
    }
    public function add_User(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'carte_bancaire' => 'required',
            'adress' => 'required',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'carte_bancaire' => $request->carte_bancaire,
            'adress' => $request->adress,
        ]);
    
        return redirect('/user')->with('success','user added successfully');
    }
    
    public function delete_User($id){
        $User =User::find($id);
        $User->delete();
        return redirect('/user');
    }

    public function edit_User($id){
        $User =User::find($id);
        return view('users/edit', compact('User'));

    }

    public function update_User(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:Users,email,'.$id,
            'carte_bancaire' => 'required|unique:Users,carte_bancaire,'.$id,
            'adress' => 'required',
        ]);
    
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'carte_bancaire' => $request->carte_bancaire,
            'adress' => $request->adress,
        ]);
    
        return redirect('/user');
    }
    
}
