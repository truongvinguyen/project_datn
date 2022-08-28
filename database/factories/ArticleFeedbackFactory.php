<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\vi_VN;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articleFeedback>
 */
class ArticleFeedbackFactory extends Factory
{
    public function definition()
    {
		//	Add Vietnam provider
		$vi_faker = $this->faker;
		$vi_faker->addProvider(new vi_VN\Person($vi_faker));
		$vi_faker->addProvider(new vi_VN\Address($vi_faker));
		$vi_faker->addProvider(new vi_VN\PhoneNumber($vi_faker));
		
		//	Customer_id
		$customers_id = User::pluck('id')->toArray();
		//	Articles_id
		$articles_id = article::where('article_status', 0)->orWhere('article_status', 1)->pluck('id')->toArray();
		//	Rating
		$rating = $this->faker->numberBetween(1, 5);
		
        return [
			'article_id' => $this->faker->randomElement($articles_id),
			'customer_id' => $this->faker->optional()->randomElement($customers_id),
			'rating' => $rating,
			'comment' => $this->faker->optional()->text(150),
        ];
    }
}
