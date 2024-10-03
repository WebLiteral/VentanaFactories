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
        Schema::create('artworks', function (Blueprint $table) {
    $table->id();
    $table->foreignIdFor(\App\Models\Collection::class);
    // $table->foreignIdFor(\App\Models\Sketchbook::class); 
    // table->foreignIdFor(\App\Models\Product::class);
    $table->string('name')->nullable();
    $table->string('image_url')->nullable();
    $table->text('description')->nullable();
    $table->date('creation_date')->nullable();
    $table->string('medium')->nullable();
    $table->string('location')->nullable();
    $table->string('dimensions')->nullable();  
    $table->boolean('visibility')->default(false);  
    $table->boolean('issensitive')->default(false);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
