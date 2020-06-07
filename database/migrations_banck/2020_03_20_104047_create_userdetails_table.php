<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id();
			$table->string('firstName');
			$table->string('lastName');
			$table->string('email')->unique;
			$table->string('username');
			$table->string('password');
			$table->integer('instituteId');
			$table->integer('addressId');
			$table->integer('titleId');
			$table->integer('gender');
			$table->integer('status');
			$table->integer('createdBy');
			$table->integer('updatedBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userdetails');
    }
}
