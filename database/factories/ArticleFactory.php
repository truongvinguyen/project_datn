<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\vi_VN;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\product;
use App\Models\category;
use App\Models\brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
 */
class ArticleFactory extends Factory
{
    public function definition()
    {
		//	Add Vietnam provider
		$vi_faker = $this->faker;
		$vi_faker->addProvider(new vi_VN\Person($vi_faker));
		$vi_faker->addProvider(new vi_VN\Address($vi_faker));
		$vi_faker->addProvider(new vi_VN\PhoneNumber($vi_faker));
		
		//	Article's author
		$authors = User::where('user_rule', 1)->get(['id', 'name'])->toArray();
		$this_author = $this->faker->randomElement($authors);
		$slug_author = Str::slug($this_author['name'], "-");
		//	Products_id
		$products_id = product::where('product_status', 1)->pluck('id')->toArray();
		//	Categories_id
		$categories_id = category::where('category_status', 0)->orWhere('category_status', 1)->pluck('id')->toArray();
		//	Brands_id
		$brands_id = brand::where('brand_status', 0)->orWhere('brand_status', 1)->pluck('id')->toArray();
		//	Random unique nummber
		$n = $this->faker->numberBetween(0, 9999);
		
        return [
			'product_id' => $this->faker->optional()->randomElement($products_id),
			'category_id' => $this->faker->optional()->randomElement($categories_id),
			'brand_id' => $this->faker->optional()->randomElement($brands_id),
			'employee_id' => $this_author['id'],
			'article_title' =>
			"Bài viết demo trên $n lượt xem của ".$this_author['name'],
			'article_slug' => "bai-viet-demo-tren-$n-luot-xem-cua-$slug_author",
			'article_content' => $this->faker->text(2000),
			'article_view_count' => $n + 1,
			'article_status' => $this->faker->numberBetween(0, 2),
        ];
    }
}
