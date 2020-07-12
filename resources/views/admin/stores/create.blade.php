@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="my-4 text-center text-secondary">Cadastre uma nova loja <br> Vamos começar? </h1>
    </div>
</div>
<form action="{{route('admin.stores.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>Nome da Loja</label>
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
        <label>Telefone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
        
        {{-- validando campo: --}}
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Celular</label>
        <input type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror" value="{{old('mobile_phone')}}">
        
        {{-- validando campo: --}}
        @error('mobile_phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Imagem da loja</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
        @error('logo') 
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control">
    </div>
    {{-- Não está sendo mais usado o select user pois o cadastro é vinculado ao user logado --}}
    {{-- <div class="form-group">
        <label>Usuário</label>
        <select name="user" class="form-control">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div> --}}
    <div>
        <button type="submit"  class="btn btn-primary my-3 px-3">
            Criar Loja
        </button>
    </div>
</form>
@endsection


