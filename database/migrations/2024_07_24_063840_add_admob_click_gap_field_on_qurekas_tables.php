<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmobClickGapFieldOnQurekasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qurekas', function (Blueprint $table) {
         $table->string('admob_click_gap')->after('banner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qurekas', function (Blueprint $table) {
            $table->dropColumn('admob_click_gap');
        });
    }
}
