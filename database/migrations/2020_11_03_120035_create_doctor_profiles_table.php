<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->enum('gender',['male', 'female'])->nullable();
            $table->string('image')->nullable();
            // $table->string('documents');
            $table->enum('doctor_status',['online', 'offline', 'busy']);
            $table->enum('is_active',['active', 'inactive', 'waiting_for_review', 'rejected'])->default('waiting_for_review');
            $table->json('ex_type');
            $table->string('national_id');
            $table->string('fees');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('specialty_id');

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');

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
        Schema::dropIfExists('doctor_profiles');
    }
}
