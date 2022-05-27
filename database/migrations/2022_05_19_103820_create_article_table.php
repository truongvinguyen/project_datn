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
        Schema::create('article', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
			
            $table->increments('id');
            $table->bigInteger('product_id')->length(20)->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('category_id')->length(10)->unsigned()->nullable();
            $table->bigInteger('employee_id')->length(20)->unsigned()->nullable();
            $table->string('article_title', 255);
            $table->string('article_slug', 255)->nullable();
            $table->mediumText('article_content');
            $table->integer('article_view_count')->default(0);
			
			//	0: hidden; 1: active; 2: pending approval
			$table->tinyInteger('article_status')->default(2);
            $table->timestamps();
			$table->timestamp('deleted_at')->nullable();

			//	Set relationship
			$table->foreign('product_id')->references('id')->on('product')
			->nullable()->onUpdate('cascade')->onDelete('no action');
			$table->foreign('brand_id')->references('id')->on('brand')
			->nullable()->onUpdate('cascade')->onDelete('no action');
			$table->foreign('category_id')->references('id')->on('category')
			->nullable()->onUpdate('cascade')->onDelete('no action');
			$table->foreign('employee_id')->references('id')->on('users')
			->nullable()->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
};
