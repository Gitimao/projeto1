@extends('contatos.layout')

@section('content')
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
    <h2>LOGIN</h2>
    <form action="" method="POST" style="margin-top:15px;">
        @csrf
        <div style="width:50%">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Login" name="name" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Senha" name="password" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Entrar</button>
            </div>
        </div>
    </form>
</div>
@endsection