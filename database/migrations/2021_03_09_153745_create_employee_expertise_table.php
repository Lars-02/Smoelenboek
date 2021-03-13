<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeExpertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_expertise', function (Blueprint $table) {
            $table->primary(['employee_id', 'expertise_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('expertise_id');
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')
                ->on('employee')
                ->onDelete('cascade');
            $table->foreign('expertise_id')
                ->references('id')
                ->on('expertise')
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
        Schema::dropIfExists('employee_expertise');
    }
}
