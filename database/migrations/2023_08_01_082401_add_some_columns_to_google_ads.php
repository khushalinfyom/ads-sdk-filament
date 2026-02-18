<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToGoogleAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_ads', function (Blueprint $table) {
            $table->string('app_id_with_ip')->nullable();
            $table->string('interstitial_with_ip')->nullable();
            $table->string('native_with_ip')->nullable();
            $table->string('banner_with_ip')->nullable();
            $table->string('rewarded_with_ip')->nullable();
            $table->string('app_open_with_ip')->nullable();
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
            $table->dropColumn('app_id_with_ip');
            $table->dropColumn('interstitial_with_ip');
            $table->dropColumn('native_with_ip');
            $table->dropColumn('banner_with_ip');
            $table->dropColumn('rewarded_with_ip');
            $table->dropColumn('app_open_with_ip');
        });
    }
}
