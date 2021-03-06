<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id');
            $table->foreignId('commodity_id');
            $table->string('start_date', 50)->nullable();
            $table->text('participants_involved')->nullable();
            $table->text('activities_done')->nullable();
            $table->text('activities_ongoing')->nullable();
            $table->text('overall_status')->nullable();
            $table->date('report_date')->nullable();
            $table->foreignId('report_period_id');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('upload_id')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
