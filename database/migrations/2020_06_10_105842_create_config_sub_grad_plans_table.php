<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigSubGradPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_sub_grad_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('main_grad_plan_id');
            $table->string('name', '255');
            $table->string('description', '512')->nullable();
            $table->tinyinteger('status')->default(1);
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('config_sub_grad_plans');
    }
}
