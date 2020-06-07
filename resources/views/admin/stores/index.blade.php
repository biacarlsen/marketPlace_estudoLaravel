@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 text-center ">
        <h1 class="mt-4 text-secondary">Lojas Cadastradas</h1>
    </div>
    <div class="col-md-12 text-right">
        <a href="{{route('admin.stores.create')}}" class="btn btn-md btn-success mb-3 px-3">Cadastrar Loja</a>
    </div>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                    <div class="btn-group">
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post">
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
        {{$stores->links()}}
    </div>
</div>


@endsection