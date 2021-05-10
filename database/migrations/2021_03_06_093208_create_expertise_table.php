<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expertises', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('employee_expertise', function (Blueprint $table) {
            $table->primary(['employee_id', 'expertise_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('expertise_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->cascadeOnDelete();
            $table->foreign('expertise_id')
                ->references('id')
                ->on('expertises')
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
        Schema::dropIfExists('expertises');
        Schema::dropIfExists('employee_expertise');
    }
}
