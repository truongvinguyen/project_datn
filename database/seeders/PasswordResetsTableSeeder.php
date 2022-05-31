<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_resets')->insert([
			[
				'email' => "nguyentruongvi2203@gmail.com",
				'token' => '$2y$10$4AeuFXLnA4G35qJJc5wvpOreHLiFto04ylNU8fJ3eFMYFPA3IOTHO',
				'created_at' => "2022-05-01 00:41:12"
			],
			[
				'email' => "nhitty28@gmail.com",
				'token' => '$2y$10$tS9boWkel4.z6iCwkCRD4uy/ZSqLehVuM/vMVQtHjI7FS63xquDfS',
				'created_at' => "2022-05-04 05:04:29"
			],
		]);
    }
}
