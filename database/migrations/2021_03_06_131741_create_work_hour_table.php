<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWorkHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_of_week', function (Blueprint $table) {
            $table->string('day')->primary();
        });

        DB::table('day_of_week')->insert([
            [
                'day' => 'Monday',
            ],
            [
                'day' => 'Tuesday',
            ],
            [
                'day' => 'Wednesday',
            ],
            [
                'day' => 'Thursday',
            ],
            [
                'day' => 'Friday',
            ],
            [
                'day' => 'Saturday',
            ],
            [
                'day' => 'Sunday',
            ],
        ]);

        Schema::create('work_hour', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('day');
            $table->unique(['start_time', 'end_time', 'day', 'employee_id']);
            $table->timestamps();

            $table->foreign('day')
                ->references('day')
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
        Schema::dropIfExists('work_hour');
    }
}
