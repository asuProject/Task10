<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApprovalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_info', function (Blueprint $table) {
            $table->increments('id');
            $table->date('department_approval_date')->nullable();
            $table->date('faculty_approval_date')->nullable();
            $table->date('university_approval_date')->nullable();
            $table->string('university_decree_number',20)->nullable();
            $table->string('university_decree_document')->nullable();
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
        Schema::dropIfExists('approval_info');
    }
}
