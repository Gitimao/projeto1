@extends('contatos.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-primary" href="{{ route('contatos.create') }}" >Cadastrar</a>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success" style="margin-top:20px;">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="row" style="margin-top:30px;">
    <div class="col-lg-12">
        <div class="row">
            <h2>Lista de Contatos</h2>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Contato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($registros as $k => $l)
                <tr>
                    <td><a href="{{ route('contatos.show',$l->id) }}">{{ $l->contato }}</a></td>
                    <td style="display:flex;">
                        <form action="{{ route('contatos.destroy',$l->id) }}" method="POST" style="margin-right:5px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        <a href="{{ route('contatos.edit',$l->id) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                    </td>
                </tr>
                <div>
                </div>
                @endforeach
                </tbody>
            </table>   
        </div>
    </div>
</div>
@endsection