<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialty_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('specialty_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['specialty_id', 'locale']);

            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialty_translations');
    }
}