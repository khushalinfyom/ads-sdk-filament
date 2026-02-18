<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraGoogleAdsFieldToGoogleAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_ads', function (Blueprint $table) {
            $table->string('app_id_second')->nullable();
            $table->string('interstitial_second')->nullable();
            $table->string('native_second')->nullable();
            $table->string('banner_second')->nullable();
            $table->string('rewarded_second')->nullable();
            $table->string('app_open_second')->nullable();
            $table->string('app_id_third')->nullable();
            $table->string('interstitial_third')->nullable();
            $table->string('native_third')->nullable();
            $table->string('banner_third')->nullable();
            $table->string('rewarded_third')->nullable();
            $table->string('app_open_third')->nullable();
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
