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
        Schema::create('pubs', function (Blueprint $table) {
            $table->id();
            $table-> string("nom");
            $table->string('image')->default(0);
            $table->integer('position');
            $table->foreignId('page_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('pubs');
    }
};
