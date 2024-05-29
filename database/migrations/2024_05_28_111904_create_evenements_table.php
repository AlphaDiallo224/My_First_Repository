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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->String('titre');
            $table->String('lieu');
            $table->String('detail');
            $table->String('image');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->foreignId('type_event_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->integer('prix');
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
        Schema::dropIfExists('evenements');
    }
};
