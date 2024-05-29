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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->integer('prix')->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->String('detail');
            $table->integer('image')->nullable();
            $table->integer('click');
            $table->foreignId('expertise_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->integer('etat')->default(0);
            $table->integer('deletable')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
