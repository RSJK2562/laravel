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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->nullable();
            $table->string("email", 50)->nullable();
            $table->string("rollnumbre", 50)->nullable();
            $table->text("class")->nullable();
            $table->string("sub1")->nullable();
            $table->string("sub2")->nullable();
            $table->string("sub3")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
