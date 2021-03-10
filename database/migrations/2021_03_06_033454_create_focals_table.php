<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('focals', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['permanent','alternate'])->nullable();
            $table->foreignId('roadmap_id')->nullable()->constrained('roadmaps')->nullOnDelete();
            $table->string('name', 50);
            $table->string('designation', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->foreignId('office_id')->nullable()->constrained('offices')->nullOnDelete();
            $table->string('telephone_number', 50)->nullable();
            $table->string('fax_number', 50)->nullable();
            $table->string('mobile_number', 50)->nullable();
            $table->string('viber_number', 50)->nullable();
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
        Schema::dropIfExists('focals');
    }
}
