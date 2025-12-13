<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationData;

return new class extends Migration
{
  public function up(): void 
  {
    Schema::create ('courses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('instructor_id')->constrained('users')->onDelete('cascade');
        $table->string('title');
        $table->text('description');
        $table->longtext('content');
        $table->timestamps();
    });
  }
  
};
