<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockerroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockerrooms', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->integer("cantidad");
            $table->string("material")->nullable();
            $table->string("color")->nullable();
            $table->string("talla")->nullable();
            $table->text("observacion")->nullable();
            $table->foreignId("condition_id")->constrained();
            $table->foreignId("unit_id")->constrained();
            $table->foreignId("region_id")->constrained();
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
        Schema::dropIfExists('lockerrooms');
    }
}
