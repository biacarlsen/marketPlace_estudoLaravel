@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="my-4 text-center text-secondary">Atualize a loja "{{$store->name}}"<br> Vamos começar? </h2>
    </div>
</div>
<form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    
    <div class="form-group">
        <label>Nome da Loja</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$store->name}}">
    
        {{-- validando campo: --}}
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$store->description}}">
    
        {{-- validando campo: --}}
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$store->phone}}">
    
        {{-- validando campo: --}}
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Celular</label>
        <input type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror" value="{{$store->mobile_phone}}">
    
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
        <p>
            <img src="{{asset('storage/' . $store->logo)}}" alt="logo da loja" class="img-fluid mt-2" width="150px">
        </p>
    </div>
        <button type="submit" class="btn btn-primary my-3 px-3">
            Atualizar Loja
        </button>
    </div>
</form>
@endsection


