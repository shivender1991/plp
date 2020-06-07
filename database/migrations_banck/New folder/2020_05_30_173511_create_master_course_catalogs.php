<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCourseCatalogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_course_catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('course_id', '20')->nullable();
            $table->string('course_title', '100')->nullable();
            $table->string('sortorder', '100')->nullable();
            $table->string('fullname', '100')->nullable();
            $table->string('shortname', '100')->nullable();
            //$table->string('idnumber', '6');
            //$table->string('summary', '6');
           // $table->string('format', '6');
           // $table->string('showgrades', '6');
           // $table->string('newsitems', '6');
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
        Schema::dropIfExists('master_course_catalogs');
    }
}
