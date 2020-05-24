@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="my-4 text-center text-secondary">Atualize o produto "{{$product->name}}"<br> Vamos começar? </h2>
    </div>
</div>
<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post">
    {{-- passando token: --}}
    @csrf 
    {{-- passando method put pra edição: --}}
    @method("PUT")

    <div class="form-group">
        <label>Nome do Produto</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control" value="{{$product->description}}">
    </div>
    <div class="form-group">
        <label>Conteúdo</label>
    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$product->body}}</textarea>
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}">
    </div>
    <div class="form-group">
        <label>Slug</label>
    <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
    </div>
    <div>
        <button type="submit"  class="btn btn-primary my-3 px-3">
            Atualizar Produto
        </button>
    </div>
</form>
@endsection


