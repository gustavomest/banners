<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->string('caminho_arquivo');
            $table->string('formato');

            $table->string('titulo');
            $table->string('plataforma');
            $table->string('campanha');
            $table->string('empresa');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
