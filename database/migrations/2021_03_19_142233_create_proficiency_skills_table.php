<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProficiencySkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proficiency_skills', function (Blueprint $table) {
            $table->increments('eduId');
            $table->string('eduTitle');
            $table->string('gpa');
            $table->string('institute');
            $table->string('startingDate');
            $table->string('endingDate');
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
        Schema::dropIfExists('proficiency_skills');
    }
}
