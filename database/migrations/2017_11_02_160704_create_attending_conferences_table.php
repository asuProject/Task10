<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendingConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attending_conferences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('conference_id');
            $table->unsignedInteger('attendance_type_id');
            $table->unsignedInteger('research_plan_id');
            $table->unsignedInteger('staff_id');
            $table->unsignedInteger('sponsor_id');
            $table->unsignedInteger('approval_info_id')->nullable();
            $table->date('request_date');
            $table->decimal('flight_amount', 8, 2);
            $table->decimal('other_amount', 8, 2);
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('attending_conferences');
    }
}