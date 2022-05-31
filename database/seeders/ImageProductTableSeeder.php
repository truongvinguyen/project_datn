<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\imageProduct;
use App\Models\product;

class ImageProductTableSeeder extends Seeder
{	
    public function run()
    {
		//  Products_id
		$products_id = product::pluck('id')->toArray();
		
		imageProduct::insert([
			[
				'image_name' =>  "Áo thun Polo nam phối sọc ATP0031",
				'image' => "6_76430dfa4473430da385ec25d4b0933d_master.jpg",
				'product_id' => $products_id[0],
			],
			[
				'image_name' =>  "Áo thun Polo nam phối sọc ATP0031",
				'image' => "4_75e5b9d481bf42f59b458245d2698ebe_master.jpg",
				'product_id' => $products_id[0],
			],
			[
				'image_name' =>  "Áo thun Polo nam phối sọc ATP0031",
				'image' => "3_5af2ae5a14b847a39805d957a4c4eaf1_master.jpg",
				'product_id' => $products_id[0],
			],
			[
				'image_name' =>  "Sơ Mi Nam Tay Dài Đen Trơn SMD0082",
				'image' => "5_517cf77eb4304410925d793813aca947_master.jpg",
				'product_id' => $products_id[1],
			],
			[
				'image_name' =>  "Sơ Mi Nam Tay Dài Đen Trơn SMD0082",
				'image' => "4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg",
				'product_id' => $products_id[1],
			],
			[
				'image_name' =>  "Sơ Mi Nam Tay Dài Đen Trơn SMD0082",
				'image' => "3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg",
				'product_id' => $products_id[1],
			],
			[
				'image_name' =>  "Hình ảnh sản phẩm 3",
				'image' => "3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg",
				'product_id' => $products_id[2],
			],
			[
				'image_name' =>  "Hình ảnh sản phẩm 3",
				'image' => "8_2b1e75367172495097e5195fc7ce2a73_master.jpg",
				'product_id' => $products_id[2],
			],
			[
				'image_name' =>  "Hình ảnh sản phẩm 3",
				'image' => "5_517cf77eb4304410925d793813aca947_master.jpg",
				'product_id' => $products_id[2],
			],
			[
				'image_name' =>  "Hình ảnh sản phẩm 3",
				'image' => "4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg",
				'product_id' => $products_id[2],
			],
			[
				'image_name' =>  "Áo Khoác Blazer Nam Premium AVE0004",
				'image' => "3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg",
				'product_id' => $products_id[3],
			],
			[
				'image_name' =>  "Áo Khoác Blazer Nam Premium AVE000",
				'image' => "4_c6d0bd090b0f41f6aa0fb4bdeb5ad5d6_master.jpg",
				'product_id' => $products_id[3],
			],
			[
				'image_name' =>  "Áo Khoác Blazer Nam Premium AVE000",
				'image' => "3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg",
				'product_id' => $products_id[3],
			],
			[
				'image_name' =>  "Áo Khoác Blazer Nam Premium AVE000",
				'image' => "1_546937fa454642cca5ffe1a3c3db5fda_master.jpg",
				'product_id' => $products_id[3],
			],
			[
				'image_name' =>  "Hình ảnh sản phẩm 6",
				'image' => "3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg",
				'product_id' => $products_id[4],
			],
			[
				'image_name' =>  "Hình ảnh sản phẩm 6",
				'image' => "2_9f7cb51b60c6465ca7d32d21d9f2948e_master.jpg",
				'product_id' => $products_id[4],
			],
			[
				'image_name' =>  "Hình ảnh sản phẩm 6",
				'image' => "1_546937fa454642cca5ffe1a3c3db5fda_master.jpg",
				'product_id' => $products_id[4],
			],
		]);
    }
}
