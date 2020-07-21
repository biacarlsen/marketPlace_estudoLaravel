@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="my-4 text-center text-secondary">Atualize a categoria "{{$category->name}}"<br> Vamos começar? </h2>
    </div>
</div>
<form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">

        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control" value="{{$category->description}}">
    </div>

    <div>
        <button type="submit" class="btn btn-primary my-3 px-3">Atualizar Categoria</button>
    </div>
</form>
@endsection


