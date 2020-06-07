<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterScedElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sced_elements', function (Blueprint $table) {
            $table->id();
            $table->string('field_type', '15');
            $table->integer('element_id');
            $table->string('format', '20');
            $table->string('description', '50');
            $table->string('definition', '100')->nullable();
            $table->integer('code');
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
        Schema::dropIfExists('master_sced_elements');
    }
}
