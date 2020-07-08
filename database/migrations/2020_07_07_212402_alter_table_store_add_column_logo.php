<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableStoreAddColumnLogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adicionando uma coluna chamada 'logo' na tabela 'stores'
        Schema::table('stores', function (Blueprint $table) {
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // revertendo a adição da coluna
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('logo');
        });
    }
}
