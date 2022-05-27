<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Provider\vi_VN;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserFactory extends Factory
{
	protected $User = User::class;
	
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
		$vi_faker = $this->faker;
		
		$vi_faker->addProvider(new vi_VN\Person($vi_faker));
		$vi_faker->addProvider(new vi_VN\Address($vi_faker));
		$vi_faker->addProvider(new vi_VN\PhoneNumber($vi_faker));
		
		//	Remove name's prefix
		$name = preg_replace('/^.+\.\s/', '', $vi_faker->name());
		//	Random a unique number (range: 0 - 99999)
		$unique = $vi_faker->unique->numberBetween(0, 99999);
		//	Generate a friendly slug's name from a given name
		$email =  Str::slug($name, "");
		//	Convert different phone type into only 1 friendly type (0...)
		$phone_number = preg_replace('/\D+/', '', $vi_faker->phoneNumber());
		$phone_number = preg_replace('/^84/', '0', $phone_number);
		$add_members = User::pluck('name')->toArray();
		
        return [
            'name' => $name,
            'email' => "$email.$unique@gmail.com",
			'phone_number' => $phone_number,
            'email_verified_at' => now(),
			// password: {{email}} (except "@gmail.com")
			'password' => Hash::make($email.$unique),
			//'user_img' => $this->faker->image('public/upload/user', null, null, null, false),
			'user_img' => "anonymous.png",
			'user_rule' => 0,
			'add_member' => $this->faker->randomElement($add_members),
            'remember_token' => Str::random(10),
        ];
    }
	
	/**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
