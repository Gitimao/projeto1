@extends('contatos.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-primary" href="{{ route('contatos.index') }}" >Listagem</a>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger" style="margin-top:20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row" style="margin-top:30px;">
    <h2>{{ $user->name }}</h2>
    <form action="{{ route('contatos.update',$user->id) }}" method="POST" style="margin-top:15px;">
        @csrf
        @method('PUT')
        <div style="width:50%">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Contato" name="contato" value="{{ $user->contato }}">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Nome" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ $user->email}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
        </div>
    </form>
</div>
@endsection