<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleMediumRateToGoogleAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_ads', function (Blueprint $table) {
         $table->string('midium_rate_google_app_id')->nullable();
         $table->string('midium_rate_google_interstitial')->nullable();
         $table->string('midium_rate_google_native')->nullable();
         $table->string('midium_rate_google_banner')->nullable();
         $table->string('midium_rate_google_rewarded')->nullable();
         $table->string('midium_rate_google_app_open')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('google_ads', function (Blueprint $table) {
            //
        });
    }
}
