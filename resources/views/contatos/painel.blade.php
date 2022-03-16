@extends('contatos.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-primary" href="{{ route('contatos.index') }}" >Listagem</a>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success" style="margin-top:20px;">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="row" style="margin-top:30px;">
    <div style="border: 1px solid #000;padding: 20px;width:50%;">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom:10px">
                <div class="row">
                    <div class="col-lg-3">
                        <h2>{{ $user->contato}}</h2>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-1 m-2">
                                <form action="{{ route('contatos.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                            <div class="col-lg-1 m-2">
                                <a href="{{ route('contatos.edit',$user->id) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="col-lg-6">
                        <p>{{ $user->email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection