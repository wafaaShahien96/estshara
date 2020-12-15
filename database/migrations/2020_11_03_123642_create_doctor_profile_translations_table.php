<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfileTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profile_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_profile_id');
            $table->string('locale')->index();
            $table->longText('bio');
            $table->unique(['doctor_profile_id', 'locale']);

            $table->foreign('doctor_profile_id')->references('id')->on('doctor_profiles')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_profile_translations');
    }
}