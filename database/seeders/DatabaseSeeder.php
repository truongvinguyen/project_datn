<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {		
		$this->call([
			UserTableSeeder::class,
			PasswordResetsTableSeeder::class,
			FailedJobsTableSeeder::class,
			PersonalAccessTokensTableSeeder::class,
			CategoryTableSeeder::class,
			BrandTableSeeder::class,
			ProductTableSeeder::class,
			ImageProductTableSeeder::class,
			ArticleTableSeeder::class,
			ArticleFeedbackTableSeeder::class,
		]);
    }
}
