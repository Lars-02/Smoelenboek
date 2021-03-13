<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeExpertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_expertises', function (Blueprint $table) {
            $table->primary(['employee_id', 'expertise_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('expertise_id');
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('expertise_id')
                ->references('id')
                ->on('expertises')
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
        Schema::dropIfExists('employee_expertises');
    }
}
