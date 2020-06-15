<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradplanMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradplan_mappings', function (Blueprint $table) {
            $table->id();
            $table->integer('master_mapping_catalog_id');
            $table->string('diploma_options', 100);
            $table->string('post_graduation_plan', 255);
            $table->string('prerequisite', 100);
            $table->string('course_options', 100);
            $table->string('mandatory_optional', 100);
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
        Schema::dropIfExists('gradplan_mappings');
    }
}
