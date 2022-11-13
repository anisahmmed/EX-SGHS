<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->integer('Batch');
            $table->string('PhoneNumber');
            $table->string('Email');
            $table->string('Profession');
            $table->string('ProfessionDetails');
            $table->string('BloodGroup');
            $table->date('DoB');
            $table->string('PresentAddress');
            $table->string('ParmanentAddress');
            $table->string('Product');
            $table->string('Size');
            $table->string('FilePath');
            $table->decimal('Amount');
            $table->string('Notes');
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
        Schema::dropIfExists('students');
    }
}
