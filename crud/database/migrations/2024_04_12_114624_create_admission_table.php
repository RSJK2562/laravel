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
        Schema::create('admission', function (Blueprint $table) {
            $table->id();
            $table->string("name", 20)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("password", 50)->nullable();
            $table->string("mobile", 20)->nullable();
            $table->string("dob", 50)->nullable();
            $table->longText("address")->nullable();
            $table->text("photos")->nullable();
            $table->text("signatures")->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission');
    }
};
