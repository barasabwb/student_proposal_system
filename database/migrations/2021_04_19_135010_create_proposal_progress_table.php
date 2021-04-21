<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_progress', function (Blueprint $table) {
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
            $table->string('supervisor_status')->default('pending');
            $table->string('supervisor_final_comment')->default('No comment');
            $table->string('chairman_status')->default('pending');
            $table->string('chairman_final_comment')->default('No comment');
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
        Schema::dropIfExists('proposal_progress');
    }
}
