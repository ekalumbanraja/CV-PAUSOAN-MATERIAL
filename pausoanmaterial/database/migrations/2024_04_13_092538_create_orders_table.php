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
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->text('id_barang');
                $table->text('namaproduk');
                $table->decimal('total_price', 40, 2); // Total harga pesanan
                $table->string('recipient_name');
                $table->string('address');
                $table->string('kodepos');
                $table->string('city');
                $table->string('phone');
                $table->string('catatan');
                $table->string('status')->default('pending');
                $table->string('payment_method')->nullable();
                $table->timestamps();

                // Menambahkan foreign key ke tabel users
                // $table->foreign('id_barang')->references('id')->on('products')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('orders');
        }
    };
