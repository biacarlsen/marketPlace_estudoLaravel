@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 text-center ">
        <h1 class="mt-4 text-secondary">Categorias Cadastradas</h1>
    </div>
    <div class="col-md-12 text-right">
        <a href="{{route('admin.categories.create')}}" class="btn btn-md btn-success mb-3 px-3">Cadastrar Categoria</a>
    </div>
</div>

@if($categories)
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td width="15%">
                    <div class="btn-group">
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
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
@endif

@if(!$categories)
<h4 class="mt-4 text-secondary">Ops, você ainda não cadastrou nenhuma categoria.</h4>
@endif

@if($categories)
<div class="row mt-4">
    <div class="col-md-12">
        {{$categories->links()}}
    </div>
</div>
@endif


@endsection