<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('street');
            $table->text('city');
            $table->text('state');
            $table->integer('postcode');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('timezone_offset');
            $table->text('timezone_description');
            $table->string('phone');
            $table->longText('large_headshot');
            $table->longText('medium_headshot');
            $table->longText('thumbnail_headshot');
            $table->longText('email')->nullable();
            $table->string('department');
            $table->string('job_title');
            $table->date('date_started');
            $table->longText('skills');
            $table->integer('manager_id');
            $table->boolean('is_manager');
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
        Schema::dropIfExists('employees');
    }
}
