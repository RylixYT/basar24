<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->references('id')->on('customers')->onDelete('cascade');
            $table->foreignId('owner_id')->constrained()->references('id')->on('customers')->onDelete('cascade');
            $table->string("name");
            $table->string("typ");
            $table->text("vertrag");
            $table->integer("vertragsnummer");
            $table->float("rabatt");
            $table->float("kaution");
            $table->date("start");
            $table->date("end");
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
        Schema::dropIfExists('rents');
    }
}
