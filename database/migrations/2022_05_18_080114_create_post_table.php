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
        Schema::create('post', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
			
            $table->increments('id')->length(10);
            $table->bigInteger('product_id')->length(20)->nullable();
            $table->integer('brand_id')->length(10)->nullable();
            $table->integer('category_id')->length(10)->nullable();
            $table->bigInteger('employee_id')->length(20)->nullable();
            $table->string('post_title');
            $table->string('post_thumbnail');
            $table->mediumText('post_content');
			
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
        Schema::dropIfExists('post');
    }
};
