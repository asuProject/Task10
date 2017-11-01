<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferenceOrganizers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_organizers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('conference_id');
            $table->unsignedInteger('organizer_id');
            $table->unsignedInteger('chairman_id')->nullable();
            $table->decimal('budget',10,2)->nullable();
            $table->text('comments')->nullable();
            $table->unsignedInteger('approval_info_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conference_organizers');
    }
}
