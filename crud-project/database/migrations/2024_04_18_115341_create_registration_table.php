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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string("name", 20)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("dob", 50)->nullable();
            $table->string("gender", 10)->nullable();
            $table->string("city", 20)->nullable();
            $table->longText("tech")->nullable();
            $table->longText("address")->nullable();
            $table->string("password", 50)->nullable();
            $table->text("photos")->nullable();
            $table->integer("otp")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
