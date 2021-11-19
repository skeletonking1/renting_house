<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('public_status');
            $table->string('eyecatch_image_url');
            $table->integer('area_id');
            $table->integer('amount_id');
            $table->integer('housetype_id');
            $table->string('firstview_url');
            $table->string('instructor_name');
            $table->longText('instruction_summary');
            $table->string('instruction_effects');
            $table->longText('instruction_details');
            $table->string('instruction_bg_url');
            $table->string('choosing_reason');
            $table->string('choosing_reason_url');
            $table->string('post_introduction_details');
            $table->string('post_introduction_url');
            $table->string('future_outlook_details');
            $table->string('download_material_url');
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
        Schema::dropIfExists('results');
    }
}
