<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('public_status');
            $table->string('featured_image_url');
            $table->string('video_url');
            $table->string('ow_image_urls');
            $table->longText('book');
            $table->string('gallery_image_urls');
            $table->string('voice_url');
            $table->string('url');
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
        Schema::dropIfExists('housings');
    }
}
