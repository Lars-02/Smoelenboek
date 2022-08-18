<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWorkDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_days', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('employee_work_day', function (Blueprint $table) {
            $table->primary(['work_day_id', 'employee_id']);
            $table->unsignedBigInteger('work_day_id');
            $table->unsignedBigInteger('employee_id');

            $table->foreign('work_day_id')
                ->references('id')
                ->on('work_days')
                ->cascadeOnDelete();
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
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
        Schema::dropIfExists('work_days');
        Schema::dropIfExists('employee_work_day');
    }
}
