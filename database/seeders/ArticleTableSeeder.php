<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		article::insert([
			[
				'product_id' => null,
				'brand_id' => null,
				'category_id' => null,
				'employee_id' => null,
				'article_title' => 'Bài viết demo đầu tiên',
				'article_slug' => 'bai-viet-demo-dau-tien',
				'article_content' => 'Nội dung của bài viết demo đầu tiên',
			],
		]);
		
        article::factory()->count(30)->create();
    }
}
