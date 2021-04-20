<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_supervisors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');

            $table->foreign('file_id')
                ->references('id')
                ->on('files');
            $table->string('thesis');
            $table->unsignedBigInteger('student_id');

            $table->foreign('student_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('supervisor_id');

            $table->foreign('supervisor_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('assigned_supervisors');
    }
}
