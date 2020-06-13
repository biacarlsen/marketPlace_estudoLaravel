<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    // mostrar view de lista de lojas:
    public function index()
    {
        // pegando todas as lojas e paginando
        //  $stores = \App\Store::paginate(10);

        // pegando apenas a loja do usuario pra mostrar apenas a dele (relação de 1:1)
        $store = auth()->user()->store;
        return view('admin.stores.index', compact('store'));
    }

    // mostrar view criar loja:
    public function create()
    {
        // verificando se o usuario ja tem loja para redirecionar - se o count retornar 1 é true.
        if (auth()->user()->store()->count()) {
            flash('Você já possui uma loja cadastrada.')->warning();
            return redirect()->route('admin.stores.index');
        }

        $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    // envio de dados usa request como parametro. Nesse caso para criar uma loja 
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        // pegando usuario logado:
        $user = auth()->user();
        // criando a loja e associando à um usuario - 1:1
        $store = $user->store()->create($data);

        // Obs: create retorna um objeto vindo do banco

        flash('Loja criada com sucesso')->success();
        return redirect()->route('admin.stores.index');
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
    public function update(StoreRequest $request, $store)
    {
        // dd($request->all()); -->debug or test
        $data = $request->all(); //-->salvando o retorno na variavel data
        $store = \App\Store::find($store); //-->buscando a loja e salvando na variável store
        $store->update($data); //--> atualizando a loja com os dados vindos da variavel data

        // Obs: update retorna um boleano

        flash('Loja atualizada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    // deletar loja e redirecionar rota: 
    public function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();

        flash('Loja deletada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }
}
