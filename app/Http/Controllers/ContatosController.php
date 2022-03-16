<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatosController extends Controller
{
    //Listar
    public function index(){
        $registros = Contato::latest()->paginate(5);
        if (Auth::check()) {
            $logado = true;
        }else{
            $logado = false;
        }
        return view('contatos.index',compact('registros','logado'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Cadastro
    public function create(){
        if (Auth::check()) {
            $logado = true;
            return view('contatos.cadastro',compact('logado'));
        }else{
            return redirect('login');
        }
    }

    //Cadastrar
    public function store(Request $request){
        if (Auth::check()) {
            $request->validate([
                'name' => 'required|min:5',
                'contato' => 'required|size:9|unique:App\Models\Contato,contato,NULL,id,deleted_at,NULL',
                'email' => 'required|email:rfc,dns|unique:App\Models\Contato,email'
            ]);
            Contato::create($request->all());
         
            return redirect()->route('contatos.index')
                            ->with('success','Contato criado com sucesso!');
        }else{
            return redirect('login');
        }
    }

    //Painel
    public function show($id){
        if (Auth::check()) {
            $logado = true;
            $user =  Contato::find($id);
            return view('contatos.painel',compact('user','logado'));
        }else{
            return redirect('login');
        }
    }

    //Edição
    public function edit($id){
        if (Auth::check()) {
            $logado = true;
            $user =  Contato::find($id);
            return view('contatos.edicao',compact('user','logado'));
        }else{
            return redirect('login');
        }
    }

    //Editar
    public function update(Request $request, $id){
        if (Auth::check()) {
            $request->validate([
                'name' => 'required|min:5',
                'contato' => 'required|size:9|unique:App\Models\Contato,contato,'.$id.',id,deleted_at,NULL',
                'email' => 'required|email:rfc,dns|unique:App\Models\Contato,email,'.$id
            ]);
            Contato::where('id', $id)
            ->update($request->all());
            return redirect()->route('contatos.show',$id)
                            ->with('success','Contato Editado com sucesso!');
        }else{
            return redirect('login');
        }
    }

    //Deletar
    public function destroy($id){
        if (Auth::check()) {
            Contato::find($id)->delete();
            return redirect()->route('contatos.index',$id)
                            ->with('success','Contato Deletado com sucesso!');
        }else{
            return redirect('login');
        }
    }
}
