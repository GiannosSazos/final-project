<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kind') -> nullable(false);
            $table-> string ('cut') -> nullable (false);
            $table-> decimal ('price_per_kg') -> nullable (false);
            $table-> decimal ('order_kg') -> nullable (true);
            $table-> text ('description') -> nullable (true);

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
        Schema::dropIfExists('meats');
    }
}
