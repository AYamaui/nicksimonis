<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('photos', function(Blueprint $table) {
            $table->bigInteger('id', false, true);
            $table->bigInteger('serie_id', false, true);
            $table->string('title');
            $table->text('thumbnail_source');
            $table->text('original_source');
            $table->timestamps();

            $table->primary(['id']);
            $table->foreign('serie_id')->references('id')->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('photos');
    }

}
