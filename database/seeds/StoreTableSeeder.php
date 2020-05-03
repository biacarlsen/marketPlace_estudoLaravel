<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pegando todas as stores:
        $stores = \App\Store::all();

        // criando produto para cada store
        foreach($stores as $store) 
        {
            $store->products()->save(factory(\App\Product::class)->make());
        }
    }
}
