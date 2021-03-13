<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMinorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_minor', function (Blueprint $table) {
            $table->primary(['employee_id', 'minor_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('minor_id');
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')
                ->on('employee')
                ->onDelete('cascade');
            $table->foreign('minor_id')
                ->references('id')
                ->on('minor')
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
        Schema::dropIfExists('employee_minor');
    }
}
