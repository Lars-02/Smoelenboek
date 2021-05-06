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
            $table->id();
            $table->string('name');
        });

        Schema::create('employee_work_day', function (Blueprint $table) {
            $table->primary(['work_day_id', 'employee_id']);
            $table->unsignedBigInteger('work_day_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();


            $table->foreign('work_day_id')
                ->references('id')
                ->on('work_day')
                ->cascadeOnDelete();
            $table->foreign('employee_id')
                ->references('id')
                ->on('employee')
                ->cascadeOnDelete();
        });

        DB::table('work_day')->insert([
            [
                'name' => 'Maandag',
            ],
            [
                'name' => 'Dinsdag',
            ],
            [
                'name' => 'Woensdag',
            ],
            [
                'name' => 'Donderdag',
            ],
            [
                'name' => 'Vrijdag',
            ],
            [
                'name' => 'Zaterdag',
            ],
            [
                'name' => 'Zondag',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_day');
        Schema::dropIfExists('employee_work_day');
    }
}
