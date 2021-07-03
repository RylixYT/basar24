<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string("model");
            $table->string("art");
            $table->string("antrieb");
            $table->string("klasse");
            $table->string("kraftstoff");
            $table->integer("ps");
            $table->integer("sitze");
            $table->integer("kofferraum");
            $table->integer("max");
            $table->float("verbrauch");
            $table->float("beschleunigung");
            $table->float("rabatt")->default(0);
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
        Schema::dropIfExists('vehicles');
    }
}
