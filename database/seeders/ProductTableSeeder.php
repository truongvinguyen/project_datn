<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		product::insert([
			[
				'product_name' => "Áo thun Polo nam phối sọc ATP0031",
				'product_price_sale' => "275000.00",
				'product_price' => "250000.00",
				'product_content' =>
				"<div><h2>Mô tả</h2></div><div><div>Áo thun Polo Nam tại Kenta luôn đẹp và sang trọng, chất liệu vải&nbsp;siêu đẹp, mịn và mát. Với form dáng thoải mái, tôn dáng cho người mặc, đủ size từ 50kg đến 90kg cho các bạn nam. Tay áo và cổ áo được dệt riêng có bổ sung sợi Spandex để đảm bảo độ đàn hồi, chống nhão qua các lần giặt.&nbsp;Chất liệu: 95% cotton - 5% Spandex thấm hút và thoáng khí tốtHướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.</div></div>",
				'category_id' => 1,
				'brand_id' => null,
				'product_status' => 1,
				'product_image' => "2_09a076d0fc58443cb261674547cf6751_master.jpg",
				'product_tag' => "aothundep,aothunpolo,aothunnam",
				'product_user' => "TRƯỜNG DUY",
				'created_at' => "2022-05-03 05:25:07",
				'updated_at' => "2022-05-03 05:25:07"
			],
			[
				'product_name' => "Sơ Mi Nam Tay Dài Đen Trơn test",
				'product_price_sale' => "275000.00",
				'product_price' => "250000.00",
				'product_content' =>
				"<h2>Mô tả</h2><h2><div></div><div>Sơ mi tay dài phiên bản cải tiến, item&nbsp;luôn sang trọng và&nbsp;lịch lãm. Chất vải thoáng mát và ít nhăn, thấm hút cực tốt. Đường may cuốn sườn tinh tế, form cực chuẩn, chất vải co giãn nhẹ, mịn mát tối ưu.&nbsp;Hướng dẫn bảo quản:- Không dùng hóa chất tẩy.- Ủi ở nhiệt độ thích hợp, hạn chế dùng máy sấy.- Giặt ở chế độ bình thường, với đồ có màu tương tự.</div></h2>",
				'category_id' => 2,
				'brand_id' => null,
				'product_status' => 1,
				'product_image' => "1_546937fa454642cca5ffe1a3c3db5fda_master.jpg",
				'product_tag' => "aothundep,aosomi,aosomidep",
				'product_user' => "TRƯỜNG DUY",
				'created_at' => "2022-05-03 05:28:30",
				'updated_at' => "2022-05-07 00:03:32"
			],
			[
				'product_name' => "Sản phẩm demo 3",
				'product_price_sale' => "290000.00",
				'product_price' => "255000.00",
				'product_content' =>
				"Mô tả...",
				'category_id' => 3,
				'brand_id' => null,
				'product_status' => 1,
				'product_image' => "2_9f7cb51b60c6465ca7d32d21d9f2948e_master.jpg",
				'product_tag' => "aothundep",
				'product_user' => "TRƯỜNG DUY",
				'created_at' => "2022-05-03 21:18:33",
				'updated_at' => "2022-05-07 21:18:33"
			],
			[
				'product_name' => "Áo Khoác Blazer Nam Premium AVE000",
				'product_price_sale' => "100000.00",
				'product_price' => "950000.00",
				'product_content' =>
				"Áo khoác Blazer là một trong nhưng món đồ không thể thiếu trong tủ đồ của các chàng trai thời trang. Ngoài việc dễ mặc, mẫu áo này còn cực kì dễ mix trong mọi dịp. Khác với áo Vest, Blazer sẽ có form dáng trẻ trung hơn, form thường qua eo một tí, nên dễ phối với nhiều loại quần tây, kaki và quần Jean. Sản phẩm được may thủ công từng chi tiết, đường may sắc nét và tỉ mỉ. Áo được may 1 lớp dễ phù hợp với thời tiết, nên độ tinh xảo rất cao ở phía trong. Túi ngực có thể để khăn hoặc cài hoa, mặt trong có 3 túi mổ để vật dụng quan trọng. Chất vải cao cấp, mềm mịn và ít nhăn, mau khô và thoáng mát. Form trẻ trung cực đẹp khi mặc.&nbsp;",
				'category_id' => 7,
				'brand_id' => null,
				'product_status' => 1,
				'product_image' => "5_517cf77eb4304410925d793813aca947_master.jpg",
				'product_tag' => "aokhoac,aovest",
				'product_user' => "TRƯỜNG DUY",
				'created_at' => "2022-05-04 05:09:22",
				'updated_at' => "2022-05-08 22:27:51"
			],
			[
				'product_name' => "Sản phẩm demo 5",
				'product_price_sale' => "290000.00",
				'product_price' => "255000.00",
				'product_content' =>
				"Mô tả...",
				'category_id' => 1,
				'brand_id' => null,
				'product_status' => 1,
				'product_image' => "3_12ee84a91f6c4fa3ac5d866f05f202d7_master.jpg",
				'product_tag' => "aothundep",
				'product_user' => "TRƯỜNG DUY",
				'created_at' => "2022-05-08 22:41:19",
				'updated_at' => "2022-05-08 22:41:19"
			],
		]);
    }
}
