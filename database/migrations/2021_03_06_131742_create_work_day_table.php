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
        Schema::create('work_day', function (Blueprint $table) {
            $table->primary(['day_id', 'employee_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('day_id');
            $table->timestamps();

            $table->foreign('day_id')
                ->references('id')
                ->on('day_of_week');
            $table->foreign('employee_id')
                ->references('id')
                ->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_day');
    }
}
