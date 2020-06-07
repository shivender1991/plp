<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterScedAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sced_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('attribute_id');
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
        Schema::dropIfExists('master_sced_attributes');
    }
}
