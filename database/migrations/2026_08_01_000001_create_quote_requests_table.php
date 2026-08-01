<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('service');
            $table->string('cargo_type')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->text('message');
            $table->string('status')->default('new');
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
