<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('history_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('id_barang'); // Mengubah dari unsignedBigInteger ke text untuk JSON
            // $table->unsignedBigInteger('order_id');
            $table->text('namaproduk')->nullable();
            $table->string('nama');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->string('address')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('history_pembelian');
    }
};
