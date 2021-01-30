<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContentTypeToAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adds', function (Blueprint $table) {
            
            $table->enum('contentType',['image','video']);
            $table->enum('adType',['bannerAdd','InterstitialAdd','rewardedAdd']);
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adds', function (Blueprint $table) {
            //
        });
    }
}
