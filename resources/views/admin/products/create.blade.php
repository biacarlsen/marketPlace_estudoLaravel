@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="my-4 text-center text-secondary">Cadastre um novo produto <br> Vamos começar? </h1>
    </div>
</div>
<form action="{{route('admin.products.store')}}" method="post">
    {{-- passando token: --}}
    @csrf 
    
    <div class="form-group">
        <label>Nome do Produto</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

        {{-- validando campo: --}}
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">

        {{-- validando campo: --}}
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Conteúdo</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror" value="{{old('body')}}"></textarea>

        {{-- validando campo: --}}
        @error('body')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">

        {{-- validando campo: --}}
        @error('price')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control">
    </div>
    {{-- nao precisamos mais do select aqui pq na hora de salvar ja vai direto pra loja do usuario logado --}}
    {{-- <div class="form-group">
        <label>Loja</label>
        <select name="store" class="form-control">
            @foreach ($stores as $store)
                <option value="{{$store->id}}">{{$store->name}}</option>
            @endforeach
        </select>
    </div> --}}
    <div>
        <button type="submit"  class="btn btn-primary my-3 px-3">
            Cadastrar Produto
        </button>
    </div>
</form>
@endsection


