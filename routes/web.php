<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // definindo uma variável e mostrando na view:
    $helloWorld = "Hello World!";
    return view('welcome', compact('helloWorld'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/model', function () {
    //EX 1:
    // selecionando todos os produtos: select * from products;
    // padrão: a tabela chamada sempre será o plural do nome do model;
    // $products = \App\Product::all(); 
    // return $products;

    //EX 2 - Active Record - registro ativo:
    // Criando um user:
    // $user = new \App\User();
    // $user->name = "Usuário teste";
    // $user->email = 'email@teste.com';
    // $user->password = bcrypt('123456');
    // $user->save();
    //EX 3 - atualizando o user e retornando o user com base no id 1:
    // $user = \App\User::find(1);
    // $user->name = 'Bianca';
    // método save cria ou atualiza:
    // $user->save();

    // return \App\User::all();
    // Obs: o método all (um dos métodos do eloquente), retorna uma collection(obj) que automaticamente retorna um json

    // EX 4 - retornando/buscando com condições específicas:
    // return \App\User::where('name', 'Bianca')->get();
    // no banco seria assim:
    // select * from users where name = 'Bianca'

    // EX 5 - retornando o primeiro resultado:
    // return \App\User::where('name', 'Bianca')->first();

    // EX 6 - retornando com paginação - 10 por pagina:
    // return \App\User::paginate(10);

    // EX 7 - MASS ASSIGNMENT - atribuição em massa:
    // $user = \App\User::create([
    //     'name' => 'fulano castro',
    //     'email' => 'email@gmail.com',
    //     'password' => bcrypt('2423423')
    // ]);
    // Obs: retorna o objeto criado

    // EX 8 - MASS UPDATE - atualização em massa:
    // $user = \App\User::find(42);
    // $user->update([
    //     'name'=> 'Ciclano'
    // ]);
    // Obs: retorna um bolean de sucesso ou erro


    // EX 9 - Pegando loja de um usuário:
    // $user = \App\User::find(4);
    // quando for de 1:1 e for chamado pela propriedade, retorna o obj único da relação
    // return $user->store;
    // quando chamada como método da pra fazer mais coisa:
    // dd($user->store()->count());


    // EX 10 - pegar produtos de uma loja:
    // 1:N
    // já retorna uma collection(objetos), então já é possível fazer modificações direto na propriedade
    // quando chama com método da pra fazer mais tratativa.

    // $loja = \App\Store::find(2);
    // return $loja->products()->where('id', 9)->get();

    // EX 11 - pegar lojas de uma categoria
    // N:N - retorna uma collection

    // $categoria = \App\Category::find(1);
    // $categoria->products;

    // EX 12 - criar uma loja para um usuário
    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja teste',
    //     'description' => 'Loja de produtos naturais',
    //     'mobile_phone' => 'XX-XXXX-XXXX',
    //     'phone' => 'XX-XXXX-XXXX',
    //     'slug' => 'loja-teste'
    // ]);

    // EX 13 - Criar um produto para uma loja
    // $store = \App\Store::find(41);
    // $product = $store->products()->create([
    //     'name' => 'Notebook Samsung',
    //     'description' => 'CORE I5',
    //     'body' => 'qualquer coisa...',
    //     'price' => 2999.99,
    //     'slug' => 'notebook-samsung'
    // ]);
    // dd($product);

    // EX 14 - Criar categorias
    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games'
    // ]);
    // \App\Category::create([
    //     'name' => 'Notebooks',
    //     'description' => null,
    //     'slug' => 'notebooks'
    // ]);
    // return  \App\Category::all();

    // EX 15 - Adicionar um produto para uma categoria ou vice-versa
    // $product = \App\Product::find(12);
    // dd($product->categories()->sync([2]));

    // $product = \App\Product::find(12);
    //     return $product->categories;
    return \App\User::all();


});

// Método get na rota tal, chamando o controller na pasta tal com a função tal:
Route::get('/admin/stores', 'Admin\\StoreController@index');
Route::get('/admin/stores/create', 'Admin\\StoreController@create');
Route::post('/admin/stores/store', 'Admin\\StoreController@store');
