<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisciplinaToCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('disciplina_id');
            $table->foreign('disciplina_id')
                ->references('id')
                ->on('disciplinas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            //
        });
    }
}
