<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
			
            $table->BigIncrements('id')->length(20);
			$table->string('product_name', 255);
			$table->double('product_price_sale', 8, 2)->nullable();
			$table->double('product_price', 8, 2);
			$table->text('product_content')->nullable();
			$table->integer('category_id')->length(11)->unsigned()->nullable();
			$table->integer('brand_id')->unsigned()->nullable();
			$table->string('product_image', 255);
			$table->string('product_tag', 255);
			$table->string('product_user', 255);
			
			$table->smallInteger('product_status')->length(11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
