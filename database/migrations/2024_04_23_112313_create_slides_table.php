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
        Schema::create('slides', function (Blueprint $table) {
            $table->string("nom");
            $table->string("url1")->nullable();
            $table->string("url2")->nullable();
            $table->string("image");
            $table->string("message1")->nullable();
            $table->string("message2")->nullable();
            $table->integer('etat')->default(0);;
            $table->integer('deletable')->default(0);
            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
