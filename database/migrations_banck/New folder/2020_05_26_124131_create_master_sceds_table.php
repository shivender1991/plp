<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterScedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sceds', function (Blueprint $table) {
            $table->id();
            $table->string('state')->nullable();
            $table->string('format');
            $table->integer('SCED_course_code');
            $table->mediumText('SCED_course_title');
            $table->longText('SCED_course_description');
            $table->mediumText('change_status');
            $table->string('data_course_subject_area')->nullable();;
            $table->string('data_course_level')->nullable();;
            $table->string('carnegie_unit_credit')->nullable();;
            $table->string('grade_span')->nullable();;
            $table->string('sequence_of_course')->nullable();;
            $table->string('SCED_creer_cluster')->nullable();;
            $table->string('additional_credit_type')->nullable();;
            $table->string('course_GPA_applicability')->nullable();;
            $table->string('course_funding_program')->nullable();;
            $table->string('high_school_course_requirement')->nullable();;
            $table->string('instruction_language')->nullable();;
            $table->string('curriculum_frame_type')->nullable();;
            $table->string('course_aligned_with_standards')->nullable();;
            $table->string('course_certification_description')->nullable();;
            $table->string('k12_end_of_course_requirement')->nullable();;
            $table->string('course_applicable_education_level')->nullable();;
            $table->string('course_section_instructional_delivery_mode')->nullable();;
            $table->string('NCAA_eligibility')->nullable();;
            $table->string('family_and_consumer_science_course_indicator')->nullable();;
            $table->string('work_based_learning_opportunity_type')->nullable();;
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
        Schema::dropIfExists('master_sceds');
    }
}
