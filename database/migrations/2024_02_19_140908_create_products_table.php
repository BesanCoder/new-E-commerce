<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->unsigned()->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('featured')->default(false);
            $table->decimal('rating', 3, 2)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
