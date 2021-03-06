<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('linkedInUrl')->nullable();
            $table->string('department');
            $table->timestamps();

            $table->foreign('department')
                ->references('department')
                ->on('departments');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->unique()->nullable();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->NullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('employees_department_foreign');
            $table->dropColumn('employee_id');
        });
    }
}
