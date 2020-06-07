@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 text-center ">
        <h1 class="mt-4 text-secondary">Produtos Cadastrados</h1>
    </div>
    <div class="col-md-12 text-right">
        <a href="{{route('admin.products.create')}}" class="btn btn-md btn-success mb-3 px-3">Cadastrar Produto</a>
    </div>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
                <td>{{$product->store->name}}</td>
                <td>
                <div class="btn-group">
                    <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-primary mr-3"><i class="far fa-edit"></i></a>
                    <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="row mt-4">
    <div class="col-md-12">
        {{$products->links()}}
    </div>
</div>


@endsection