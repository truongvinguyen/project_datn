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
        Schema::create('article_feedback', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
			
            $table->bigIncrements('id');
			$table->integer('article_id')->unsigned();
			$table->bigInteger('customer_id')->length(20)->unsigned()->nullable();
			$table->string('comment', 255)->nullable();
			$table->tinyInteger('rating');
			
			$table->boolean('is_rejected');
            $table->timestamps();
			
			//	Set relationship
			$table->foreign('article_id')->references('id')->on('article')
			->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('customer_id')->references('id')->on('users')
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
        Schema::dropIfExists('article_feedback');
    }
};
