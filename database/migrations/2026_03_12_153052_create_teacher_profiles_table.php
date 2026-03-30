<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('subject');
            $table->integer('experience');
            $table->string('education');
            $table->integer('price');
            $table->string('availability');
            $table->enum('gender', ['male','female']);
            $table->string('status')->default('pending');
            $table->enum('jenjang', ['SD','SMP','SMA']);
            $table->text('detail')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_profiles');
        Schema::table('teacher_profiles', function (Blueprint $table) {
            $table->string('status')->default('pending');
});
    }
};