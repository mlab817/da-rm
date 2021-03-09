<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadmaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commodity_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('report_id')->nullable()->constrained('reports')->nullOnDelete();
            $table->string('start_date', 50)->nullable();
            $table->text('participants_involved')->nullable();
            $table->text('activities_done')->nullable();
            $table->text('activities_ongoing')->nullable();
            $table->text('overall_status')->nullable();
            $table->date('report_date')->nullable();
            $table->foreignId('upload_id')->nullable()->constrained('uploads')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
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
        Schema::dropIfExists('roadmaps');
    }
}
