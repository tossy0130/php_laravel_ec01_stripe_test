<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// ファサード
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Black T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/1.jpg',
                'price' => '4500'
            ],
            [
                'name' => 'White T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/2.jpg',
                'price' => '4500'
            ],
            [
                'name' => 'White T-shirt 2',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/3.jpg',
                'price' => '6800'
            ],
            [
                'name' => 'Black T-shirt Plain',
                'description' => 'コットン素材を使用したクルーネックのカットソー。シンプルなデザインで、様々なスタイリングに合わせやすいアイテム。',
                'image' => '/images/4.jpg',
                'price' => '4500'
            ],
            [
                'name' => 'Black T-shirt 2',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/5.jpg',
                'price' => '4500'
            ],
            [
                'name' => 'Navy T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/6.jpg',
                'price' => '4500'
            ],
            [
                'name' => 'Border T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/7.jpg',
                'price' => '6800'
            ],
            [
                'name' => 'Border Long Sleeve T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/8.jpg',
                'price' => '7800'
            ],
            [
                'name' => 'Gray T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/9.jpg',
                'price' => '4500'
            ],

            //================= 追加 ===============
            [
                'name' => 'AAA T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/10.jpg',
                'price' => '3880'
            ],

            [
                'name' => 'BBB T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/11.jpg',
                'price' => '5520'
            ],

            [
                'name' => 'CCC T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/12.jpg',
                'price' => '1540'
            ],

            [
                'name' => 'DDD T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/13.jpg',
                'price' => '13000'
            ],

            [
                'name' => 'EEE T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/14.jpg',
                'price' => '8880'
            ],

            [
                'name' => 'FFF T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/15.jpg',
                'price' => '6690'
            ],

            [
                'name' => 'GGG T-shirt',
                'description' => 'コットン素材を使用したクルーネックのカットソー。',
                'image' => '/images/16.jpg',
                'price' => '17550'
            ],

        ]);
    }
}
