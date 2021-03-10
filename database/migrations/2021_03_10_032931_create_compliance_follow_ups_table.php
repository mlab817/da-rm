<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceFollowUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliance_follow_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compliance_review_id')->nullable()->constrained('compliance_reviews')->nullOnDelete();
            $table->foreignId('compliance_status_id')->nullable()->constrained('compliance_statuses')->nullOnDelete();
            $table->text('remarks')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('compliance_follow_ups');
    }
}
