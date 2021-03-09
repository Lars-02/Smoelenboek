<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLearningLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_learning_lines', function (Blueprint $table) {
            $table->primary(['employee_id', 'learning_line_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('learning_line_id');
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('learning_line_id')
                ->references('id')
                ->on('learning_lines')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_learning_lines');
    }
}
