<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriaAndAnexoToAtlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atlas', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->nullable(false)->change();
            $table->string('anexo')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atlas', function (Blueprint $table) {
            //
        });
    }
}
