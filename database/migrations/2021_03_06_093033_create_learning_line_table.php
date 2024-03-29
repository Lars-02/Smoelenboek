<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_lines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('employee_learning_line', function (Blueprint $table) {
            $table->primary(['employee_id', 'learning_line_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('learning_line_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->cascadeOnDelete();
            $table->foreign('learning_line_id')
                ->references('id')
                ->on('learning_lines')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_lines');
        Schema::dropIfExists('employee_learning_line');
    }
}
