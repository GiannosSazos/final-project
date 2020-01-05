<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> string ('model') -> nullable (false);
            $table-> integer ('year') -> nullable (false);
            $table->string('type') ->nullable (false);
            $table->string('fuel_type') ->nullable (false);
            $table->string('transmission') ->nullable (false);
            $table->integer('doors') ->nullable (false);
            $table->integer('price') ->nullable (false);

            $table -> timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
