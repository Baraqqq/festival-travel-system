<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_id')->constrained()->onDelete('cascade');
            $table->integer('capaciteit');
            $table->string('status')->default('available');
            $table->time('breng_tijd');
            $table->time('ophaal_tijd');
            $table->string('ophaal_punt');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};