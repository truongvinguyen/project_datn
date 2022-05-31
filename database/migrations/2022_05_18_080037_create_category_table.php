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
        Schema::create('category', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
	
            $table->increments('id')->length(10);
			$table->bigInteger('employee_id')->length(20)->unsigned()->nullable();
            $table->integer('parent_id')->length(10)->unsigned()->nullable();
            $table->string('category_name', 100);
            $table->string('category_slug', 100)->nullable();
			$table->string('category_image', 255)->nullable();
			$table->text('category_description')->nullable();
			
			//	0: hidden; 1: active; 2: pending approval
			$table->tinyInteger('category_status')->default(2);
			$table->timestamps();
			$table->timestamp('deleted_at')->nullable();
			
			//	Set relationship
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
        Schema::dropIfExists('category');
    }
};
