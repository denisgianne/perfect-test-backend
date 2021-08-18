<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedFloat('price', 8, 2);
            $table->unsignedSmallInteger('qty');
            $table->set('discount_type', ['percentual', 'value'])->nullable()->comment('Se o desconto é percentual ou valor decrescido.');
            $table->unsignedFloat('discount', 10, 2)->comment('Se for percentual, multiplica-se no final. Por valor, subtrai-se este valor.');
            $table->unsignedFloat('total', 10, 2);
            $table->timestamps();

            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('product_id')->references('id')->on('products');
            $table->index(['sale_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_products');
    }
}
