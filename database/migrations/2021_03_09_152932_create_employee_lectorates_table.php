<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLectoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_lectorates', function (Blueprint $table) {
            $table->primary(['employee_id', 'lectorate_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('lectorate_id');
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('lectorate_id')
                ->references('id')
                ->on('lectorates')
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
        Schema::dropIfExists('employee_lectorates');
    }
}
