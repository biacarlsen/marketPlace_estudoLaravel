<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // mostrar view de lista de lojas:
    public function index()
    {
        // pegando todas as lojas e paginando
        $stores = \App\Store::paginate(10);

        return view('admin.stores.index', compact('stores'));
    }

    // mostrar view criar loja:
    public function create()
    {
        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    // envio de dados usa request como parametro. Nesse caso para criar uma loja 
    public function store(Request $request)
    {
        $data = $request->all();
        // buscando usuário:
        $user = \App\User::find($data['user']);
        // criando a loja e associando à um usuario - 1:1
        $store = $user->store()->create($data);

        // Obs: create retorna um objeto vindo do banco
        return $store;
    }

    // mostrando a view de editar usuário
    //passando, por parâmetro na função, o id da loja que vai ser editada: 
    public function edit($store)
    {
        // buscando a loja e salvando na variável
        $store = \App\Store::find($store);
        // passando a variavel/loja para a view por meio do compact
        return view('admin.stores.edit', compact('store'));
    }

    // como aqui envia dados, é necessário o uso do request. Tbm passando a loja a ser atualizada:
    public function update(Request $request, $store)
    {
        // dd($request->all()); -->debug or test
        $data = $request->all(); //-->salvando o retorno na variavel data
        $store = \App\Store::find($store); //-->buscando a loja e salvando na variável store
        $store->update($data); //--> atualizando a loja com os dados vindos da variavel data

        // Obs: update retorna um boleano
        return $store;
    }

    // deletar loja e redirecionar rota: 
    public function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();

        return redirect('admin/stores');
    }
}
