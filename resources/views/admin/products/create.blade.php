@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="my-4 text-center text-secondary">Cadastre um novo produto <br> Vamos começar? </h1>
    </div>
</div>
<form action="{{route('admin.products.store')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>Nome do Produto</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label>Conteúdo</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input type="text" name="price" class="form-control">
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control">
    </div>
    <div class="form-group">
        <label>Loja</label>
        <select name="user" class="form-control">
            @foreach ($stores as $store)
                <option value="{{$store->id}}">{{$store->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit"  class="btn btn-primary my-3 px-3">
            Criar Produto
        </button>
    </div>
</form>
@endsection


