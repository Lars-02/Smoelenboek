<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('employee_minor', function (Blueprint $table) {
            $table->primary(['employee_id', 'minor_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('minor_id');


            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->cascadeOnDelete();
            $table->foreign('minor_id')
                ->references('id')
                ->on('minors')
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
        Schema::dropIfExists('minors');
        Schema::dropIfExists('employee_minor');
    }
}
