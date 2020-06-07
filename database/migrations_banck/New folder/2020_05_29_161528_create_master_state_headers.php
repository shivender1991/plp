<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterStateHeaders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_state_headers', function (Blueprint $table) {
            $table->id();
            $table->string('name', '100');
            $table->string('input_type', '20')->nullable();
            $table->string('input_type_label', '80')->nullable();
            $table->string('input_type_name', '20')->nullable();
            $table->string('input_type_id', '20')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('master_state_headers');
    }
}
