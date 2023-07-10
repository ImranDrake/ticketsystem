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
        Schema::create('ticket_systems', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            //$table->string('');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
           // $table->bigInteger('time')->diffForHumans();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_systems');
    }
};
