<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadmapVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadmap_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roadmap_id')->constrained()->cascadeOnDelete();
            $table->date('date')->nullable();
            $table->string('title');
            $table->text('url')->nullable();
            // we will keep track of the roadmap versions here
            $table->unsignedBigInteger('version')->nullable();
            // this is the version associated with the report
            $table->foreignId('report_id')->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('roadmap_versions');
    }
}
