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
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('linkedInUrl')->nullable();
            $table->string('department');
            $table->timestamps();

            $table->foreign('department')
                ->references('department')
                ->on('departments');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
