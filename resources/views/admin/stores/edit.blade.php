@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="my-4 text-center text-secondary">Atualize a loja "{{$store->name}}"<br> Vamos começar? </h2>
    </div>
</div>
<form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="post">
    @csrf
    @method("PUT")
    
    <div class="form-group">
        <label>Nome da Loja</label>
        <input type="text" name="name" class="form-control" value="{{$store->name}}">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control" value="{{$store->description}}">
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="phone" class="form-control" value="{{$store->phone}}">
    </div>
    <div class="form-group">
        <label>Celular</label>
        <input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="{{$store->slug}}">
    </div>
        <button type="submit" class="btn btn-primary my-3 px-3">
            Atualizar Loja
        </button>
    </div>
</form>
@endsection


