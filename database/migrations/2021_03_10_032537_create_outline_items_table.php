<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutlineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outline_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_number', 20)->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('outline_items')->nullOnDelete();
            $table->unsignedInteger('level')->default(0);
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
        Schema::dropIfExists('outline_items');
    }
}
