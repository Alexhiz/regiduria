<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarimbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marimbas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("cantidad")->nullable();
            $table->text("caracteristica");
            $table->string("color")->nullable();
            $table->string("tamano")->nullable();
            $table->string("marca")->nullable();
            $table->string("num_serie")->nullable();
            $table->text("observacion")->nullable();
            $table->foreignId("condition_id")->constrained();
            $table->foreignId("ubication_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marimbas');
    }
}
