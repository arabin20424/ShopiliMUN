```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Product owner
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Product information
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('category');
            $table->string('listing_type')->default('Sale');
            $table->string('image')->nullable();
            $table->string('status')->default('Available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};