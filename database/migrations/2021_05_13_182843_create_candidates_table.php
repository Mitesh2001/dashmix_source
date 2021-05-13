<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->time('birth_time');
            $table->string('birth_place');
            $table->string('height');
            $table->string('weight');
            $table->string('eduction');
            $table->string('occupation');
            $table->string('father_name');
            $table->string('mother_name');
            $table->tinyInteger('brothers');
            $table->tinyInteger('sisters');
            $table->string('father_occupation');
            $table->string('mother_occupation');
            $table->bigInteger('father_contact');
            $table->string('contact');
            $table->string('email');
            $table->text('resident_address');
            $table->text('native_address');
            $table->string('maternal');
            $table->string('maternal_place');
            $table->string('hobbies');
            $table->string('expectations');
            $table->string('remark');
            $table->string('picture');
            $table->string('status');
            $table->tinyInteger('done_by');
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
        Schema::dropIfExists('candidates');
    }
}
