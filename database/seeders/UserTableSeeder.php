<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::insert([
			[
				'name' => 'Nguyễn Trường Vi',
				'email' => 'nguyentruongvi2203@gmail.com',
				'email_verified_at' => NULL,
				'password' => '$2y$10$B6J53AyOOF.gbC6DJIvMauasqmKxjpzIU2GqmUjsNPRXneycWREwm',
				'user_img' => 'myposter.jpg',
				'user_rule' => 1,
				'add_member' => 'Nguyễn Trường Vi',
				'remember_token' => NULL,
				'created_at' => '2022-05-01 04:51:47',
				'updated_at' => '2022-05-01 04:51:47'
			],
			[
				'name' => 'Trường Duy',
				'email' => 'vintps14865@fpt.edu.vn',
				'email_verified_at' => NULL,
				'password' => '$2y$10$AWovqijQBfEMrZtCZVICbOgm/7H0Dp1FRNjlD67tciYlCfxHfx2oq',
				'user_img' => 'z3365000135399_8f970424e54d4faf6530325e8ba3f0dc.jpg',
				'user_rule' => 1,
				'add_member' => 'Nguyễn Trường Vi',
				'remember_token' => NULL,
				'created_at' => '2022-05-02 07:50:45',
				'updated_at' => '2022-05-02 07:50:45'
			],
			[
				'name' => 'Trần Văn Huỳnh Đức',
				'email' => 'duc.hyunn@gmail.com',
				'email_verified_at' => NULL,
				'password' => '$2y$10$B0B.DeZbtQLaS/SUkGGWbuu6IJmXasgzah7LuuQSxohhjw5cG50KW',
				'user_img' => '1_546937fa454642cca5ffe1a3c3db5fda_master.jpg',
				'user_rule' => 1,
				'add_member' => 'Trường Duy',
				'remember_token' => NULL,
				'created_at' => '2022-05-03 06:32:07',
				'updated_at' => '2022-05-03 06:32:07'
			],
			[
				'name' => 'Trần Thị Yến Nhi',
				'email' => 'nhitty28@gmail.com',
				'email_verified_at' => NULL,
				'password' => '$2y$10$8yA0xtSG6ZmnUyg8..74aeVuMH23sY2vNfXQdL1pnsRMX6F73QloG',
				'user_img' => '5_517cf77eb4304410925d793813aca947_master.jpg',
				'user_rule' => 1,
				'add_member' => 'Trường Duy',
				'remember_token' => NULL,
				'created_at' => '2022-05-04 05:00:53',
				'updated_at' => '2022-05-04 05:00:53'
			],
			[
				'name' => 'Nguyễn Bảo Toàn',
				'email' => 'nguyenbaotoan2001@gmail.com',
				'email_verified_at' => NULL,
				'password' => '$2y$10$oKb5s9GZ5cwj6TXyBisGNe/x1KmLzWqrnk.TJnODABE6iaV5JOuca',
				'user_img' => 'anonymous.png',
				'user_rule' => 1,
				'add_member' => 'Trần Thị Yến Nhi',
				'remember_token' => NULL,
				'created_at' => '2022-05-05 08:00:12',
				'updated_at' => '2022-05-05 08:00:12'
			],
			[
				'name' => 'Nguyễn Phan Trường',
				'email' => 'truongnpps11834@fpt.edu.vn',
				'email_verified_at' => NULL,
				'password' => '$2y$10$H.sW39T3tAB58stL7S73Wuk0Jx1XaseQuh0TQ9Ii/r9hvZ5YC8L0i',
				'user_img' => 'anonymous.png',
				'user_rule' => 1,
				'add_member' => 'Nguyễn Bảo Toàn',
				'remember_token' => NULL,
				'created_at' => '2022-05-05 10:21:53',
				'updated_at' => '2022-05-05 10:21:53'
			],
		]);

        User::factory()->count(20)->create();
    }
}