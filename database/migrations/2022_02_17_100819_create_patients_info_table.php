<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients_info', function (Blueprint $table) {
            $table->id('patient_id')->unique();
            $table->string('fname');           
            $table->string('lname');
            $table->datetime('dob');
            $table->text('email');
            $table->text('address');
            $table->text('phone');
            $table->text('gender');
            $table->text('description');
            $table->text('doctor');
            $table->string('image');
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
        Schema::dropIfExists('patients_info');
    }
}
