@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="my-4 text-center text-secondary">Atualize o produto "{{$product->name}}"<br> Vamos começar? </h2>
    </div>
</div>
<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
    {{-- passando token: --}}
    @csrf 
    {{-- passando method put pra edição: --}}
    @method("PUT")

    <div class="form-group">
        <label>Nome do Produto</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">

         {{-- validando campo: --}}
         @error('name')
         <div class="invalid-feedback">
             {{$message}}
         </div>
         @enderror
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control @error('text') is-invalid @enderror" value="{{$product->description}}">

         {{-- validando campo: --}}
         @error('text')
         <div class="invalid-feedback">
             {{$message}}
         </div>
         @enderror
    </div>
    <div class="form-group">
        <label>Conteúdo</label>
    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>

     {{-- validando campo: --}}
     @error('body')
     <div class="invalid-feedback">
         {{$message}}
     </div>
     @enderror
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}">

         {{-- validando campo: --}}
         @error('price')
         <div class="invalid-feedback">
             {{$message}}
         </div>
         @enderror
    </div>
    <div class="form-group">
        <label>Selecione a(s) categoria(s)</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" 
                    @if($product->categories->contains($category)) selected @endif>{{$category->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Imagens do produto</label>
        <input type="file" name="photos[]" class="form-control @error('photos') is-invalid @enderror" multiple>
        @error('photos')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
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

<hr>

<div class="row mb-5">
    @foreach ($product->photos as $photo)
        <div class="col-md-2 col-xs-4 col-sm-4 text-center">
            <img src="{{asset('storage/' . $photo->image)}}" alt="" class="img-fluid" style="max-width: 150px">
            <form action="{{route('admin.photo.remove')}}" method="post">
                {{-- passando a img q vai ser excluida por de baixo dos panos com hidden no input --}}
                @csrf
                
                <input type="hidden" name="photoName" value="{{$photo->image}}">
                <button type="submit" class="btn btn-sm btn-danger mt-2">Remover</button>
            </form>
        </div>
    @endforeach
</div>
@endsection


