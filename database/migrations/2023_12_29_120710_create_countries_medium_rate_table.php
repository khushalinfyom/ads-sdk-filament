<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesMediumRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_medium_rate', function (Blueprint $table) {
                  $table->id();
                  $table->string('medium_rate_countries_name')->unique();
                  $table->string('medium_rate_countries_code')->unique();
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
        Schema::dropIfExists('countries_medium_rate');
    }
}
