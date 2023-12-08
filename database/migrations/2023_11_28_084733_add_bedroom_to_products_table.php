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
            $table->string('no_of_bedrooms')->nullable()->after('product_discription');
            $table->string('no_of_bathrooms')->nullable()->after('product_discription');
            $table->string('area')->nullable()->after('product_discription');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('no_of_bedrooms');
            $table->dropColumn('no_of_bathrooms');
            $table->dropColumn('area');
        });
    }
};
