<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_posting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_id');
            $table->string('job_type',250);
            $table->string('title',250);
            $table->longText('description');
            $table->string('skills',250);
            $table->string('location',250);
            $table->date('posted_date')->default(now());
            $table->date('expiry_date');
            $table->boolean('is_active')->comment('0:inactive,1:active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
