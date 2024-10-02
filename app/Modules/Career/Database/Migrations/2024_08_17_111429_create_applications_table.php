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
        Schema::create('application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id');
            $table->string('first_name',250);
            $table->string('last_name',250);
            $table->string('email',250);
            $table->string('country_code');
            $table->string('phone_number');
            $table->string('resume_url');
            $table->string('cover');
            $table->string('status')->comment('new,inprogress,closed')->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application');
    }
};
