<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectorateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectorates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('employee_lectorate', function (Blueprint $table) {
            $table->primary(['employee_id', 'lectorate_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('lectorate_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->cascadeOnDelete();
            $table->foreign('lectorate_id')
                ->references('id')
                ->on('lectorates')
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
        Schema::dropIfExists('lectorates');
        Schema::dropIfExists('employee_lectorate');
    }
}
