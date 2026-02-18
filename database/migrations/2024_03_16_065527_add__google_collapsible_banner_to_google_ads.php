<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleCollapsibleBannerToGoogleAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_ads', function (Blueprint $table) {
         $table->string('google_collapsible_banner')->after('banner');
         $table->string('google_collapsible_banner_second')->after('banner_second');
         $table->string('google_collapsible_banner_third')->after('banner_third');
         $table->string('google_collapsible_banner_with_ip')->after('banner_with_ip');
         $table->string('midium_rate_google_collapsible_banner')->after('midium_rate_google_banner');
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

        });
    }
}
