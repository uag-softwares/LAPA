<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAnexoToAtlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atlas', function (Blueprint $table) {
            $table->longtext('anexo')->nullable(true)->change();
            $table->dropColumn('tipo_anexo');
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
