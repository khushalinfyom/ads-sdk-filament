<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeNullableFieldIntoGoogleAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_ads', function (Blueprint $table) {
            $table->string('app_id')->nullable()->change();
            $table->string('interstitial')->nullable()->change();
            $table->string('native')->nullable()->change();
            $table->string('banner')->nullable()->change();
            $table->string('rewarded')->nullable()->change();
            $table->string('app_open')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
