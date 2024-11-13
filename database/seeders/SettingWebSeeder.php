<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting_webs')->insert([
            ['id' => '1',
            'name' => 'Sản phẩm bán chạy - Best Seller',
            'type' => 'best_seller',
            'value' => '["dk8000","sp01","PK-CLS","FULL-CHS-CH10","FULL-CHS-CH12PRO","FULL-ESS-ES12PLUS","D5000","D3000","D2800","TA 150"]',
            'created_at' => '2024-11-13 11:15:46',
            'updated_at' => '2024-11-13 11:15:46'],

            ['id' => '2','name' => 'Sản phẩm giảm giá - Slide Sale Offer',
            'type' => 'sale_offer',
            'value' => '[{"code":"CT ONE","description":"S\\u1ea3n ph\\u1ea9m \\u0111ang gi\\u1ea3m gi\\u00e1 c\\u1ef1c s\\u1ed1c h\\u00e3y li\\u00ean h\\u1ec7 ngay l\\u1eadp t\\u1ee9c.","timeSale":"2024-11-14T11:41"},{"code":"D3000","description":"Li\\u00ean h\\u1ec7 ngay \\u0111\\u1ec3 nh\\u1eadn \\u0111\\u01b0\\u1ee3c gi\\u00e1 h\\u1ea5p d\\u1eabn nh\\u1ea5t.","timeSale":"2024-11-22T01:41"}]',
            'created_at' => '2024-11-13 11:42:20',
            'updated_at' => '2024-11-13 11:42:20']
        ]);
    }
}
