<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLectorateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_lectorate', function (Blueprint $table) {
            $table->primary(['employee_id', 'lectorate_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('lectorate_id');
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')
                ->on('employee')
                ->onDelete('cascade');
            $table->foreign('lectorate_id')
                ->references('id')
                ->on('lectorate')
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
        Schema::dropIfExists('employee_lectorate');
    }
}
