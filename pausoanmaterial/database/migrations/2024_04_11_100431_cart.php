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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedInteger('stok');
            $table->decimal('price', 40, 2);
            $table->timestamps();

            // Menambahkan foreign key ke tabel users
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            // Menambahkan foreign key ke tabel products
            $table->foreign('id_barang')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
