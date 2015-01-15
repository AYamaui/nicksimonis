<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('series', function(Blueprint $table) {
            $table->bigInteger('id', false, true);
            $table->string('title');
            $table->text('description');
            $table->text('thumbnail_source');
            $table->text('original_source');
            $table->timestamps();

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('series');
    }

}
