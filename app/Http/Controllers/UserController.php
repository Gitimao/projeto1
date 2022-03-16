<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{   

    public function index(){
        $logado = false;
        return view('user.login');
    }
    public function store(Request $request){
        $admin = User::find(1);
        $request->request->add(['old_val' => 'admin']);
        $request->validate([
            'name' => ['required', 'string', 'max:255','same:old_val'],
            'password' => ['required','min:3','same:old_val']
        ]);
        Auth::login($admin);
        return redirect()->route('contatos.index');
    }

    public function show($id){

    }

    //Logoff
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('contatos.index');
    }
}