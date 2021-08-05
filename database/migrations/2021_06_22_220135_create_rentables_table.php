<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentables', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("kennzeichen");
            $table->string("bild");
            $table->foreignId('rent_id')->nullable()->constrained()->references('id')->on('rents')->onDelete('cascade');
            $table->foreignId('owner_id')->constrained()->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('rentables');
    }
}
