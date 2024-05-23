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
                Schema::create('products', function (Blueprint $table) {
                    $table->id();
                    $table->string('sku');
                    $table->string('product_name')->nullable();
                    $table->unsignedBigInteger('category_id');
                    $table->integer('stok')->nullable(); // Change to integer
                    $table->string('image')->nullable();
                    $table->string('description')->nullable();
                    $table->decimal('price', 40, 2)->nullable();
                    $table->timestamps();
                
                    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
