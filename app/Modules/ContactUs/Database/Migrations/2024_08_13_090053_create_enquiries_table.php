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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('message', 1000); // Use varchar with a max length of 1000 characters
            $table->string('ip_address'); // Get IP Address of client request
            $table->string('website')->nullable();
            $table->text('response')->nullable();
            $table->string('response_by')->nullable();
            $table->enum('status', ['open', 'replied'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
