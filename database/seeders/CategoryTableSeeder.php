<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\User;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
		//  Random employees_id
		$employees_id = User::where('user_rule', 1)->pluck('id')->toArray();
		
        category::insert([
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'category_name' => "Áo thun",
				'category_slug' => "ao-thun",
				'category_image' => "123456",
				'category_description' => "...",
				'category_status' => 1,
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'category_name' => "Áo sơ mi",
				'category_slug' => "ao-so-mi",
				'category_image' => "222222",
				'category_description' => "...",
				'category_status' => 1,
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'category_name' => "Đầm, váy",
				'category_slug' => "dam-vay",
				'category_image' => "1",
				'category_description' => "...",
				'category_status' => 0,
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'category_name' => "Quần tây",
				'category_slug' => "quan-tay",
				'category_image' => "1",
				'category_description' => "...",
				'category_status' => 0,
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'category_name' => "Quần kaki",
				'category_slug' => "quan-kaki",
				'category_image' => "123456",
				'category_description' => "...",
				'category_status' => 1,
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'category_name' => "Quần jean",
				'category_slug' => "quan-jean",
				'category_image' => "222222",
				'category_description' => "...",
				'category_status' => 1,
			],
			[
				'employee_id' => $employees_id[array_rand($employees_id)],
				'category_name' => "Áo khoác",
				'category_slug' => "ao-khoac",
				'category_image' => "123456",
				'category_description' => "...",
				'category_status' => 1,
			],
		]);
    }
}
