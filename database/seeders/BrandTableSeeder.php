<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\brand;
use App\Models\User;

class BrandTableSeeder extends Seeder
{
    public function run()
    {
		//  Random employees_id
		$employees_id = User::where('user_rule', 1)->pluck('id')->toArray();

        brand::insert([
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'brand_name' => "Dior",
				'brand_slug' => "dior",
				'brand_image' => "",
				'brand_description' => "...",
				'brand_status' => 1,
				'created_at' => now(),
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'brand_name' => "Chanel",
				'brand_slug' => "chanel",
				'brand_image' => "",
				'brand_description' => "...",
				'brand_status' => 1,
				'created_at' => now(),
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'brand_name' => "Gucci",
				'brand_slug' => "gucci",
				'brand_image' => "",
				'brand_description' => "...",
				'brand_status' => 1,
				'created_at' => now(),
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'brand_name' => "Luis Vuitton",
				'brand_slug' => "luis-vuitton",
				'brand_image' => "",
				'brand_description' => "...",
				'brand_status' => 1,
				'created_at' => now(),
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'brand_name' => "Luôn vui tươi",
				'brand_slug' => "luon-vui-tuoi",
				'brand_image' => "",
				'brand_description' => "...",
				'brand_status' => 1,
				'created_at' => now(),
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'brand_name' => "Never gonna give you up",
				'brand_slug' => "never-gonna-give-you-up",
				'brand_image' => "",
				'brand_description' => "...",
				'brand_status' => 1,
				'created_at' => now(),
			],
		]);
    }
}
