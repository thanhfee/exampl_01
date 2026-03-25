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
    Schema::table('products', function (Blueprint $table) {
        // Kiểm tra nếu chưa có cột stock thì thêm vào
        if (!Schema::hasColumn('products', 'stock')) {
            $table->integer('stock')->default(0)->after('price');
        }

        // Kiểm tra nếu chưa có cột sale_price thì thêm vào
        if (!Schema::hasColumn('products', 'sale_price')) {
            $table->decimal('sale_price', 15, 2)->nullable()->after('price');
        }

        // Thêm cột is_delete
        $table->tinyInteger('is_delete')->default(0);
    });
}
public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('is_delete');
    });
}
};
