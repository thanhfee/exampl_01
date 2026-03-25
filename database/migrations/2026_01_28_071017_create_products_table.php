<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); // Ràng buộc category_id
        $table->string('name');
        $table->decimal('price', 15, 2); // Giá >= 0
        $table->decimal('sale_price', 15, 2)->nullable(); // sale_price <= price
        $table->integer('stock')->default(0); // Số nguyên >= 0
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->boolean('is_active')->default(1);
        $table->boolean('is_delete')->default(0); // Dùng cho xóa mềm
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
