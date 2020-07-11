@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 text-center ">
        <h1 class="mt-4 text-secondary">Loja Cadastrada</h1>
    </div>
    <div class="col-md-12 text-right">
        @if(!$store)
        <a href="{{route('admin.stores.create')}}" class="btn btn-md btn-success mb-3 px-3">Cadastrar Loja</a>
        @endif
    </div>
</div>

@if($store)
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Nº produtos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-primary mr-3"><i class="far fa-edit"></i></a>
                    <div class="btn-group">
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endif

@if(!$store)
<h4 class="mt-4 text-secondary">Ops, você ainda não cadastrou sua loja.</h4>
@endif


{{-- paginação caso eu quisesse mostrar todas as lojas --}}
{{-- <div class="row mt-4">
    <div class="col-md-12">
        {{$stores->links()}}
    </div>
</div> --}}


@endsection