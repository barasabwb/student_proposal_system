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
            $table->integer('file_id');
            $table->string('thesis');
            $table->integer('student_id');
            $table->integer('supervisor_id');
            $table->string('supervisor_status');
            $table->string('supervisor_final_comment');
            $table->string('chairman_status');
            $table->string('chairman_final_comment');
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
