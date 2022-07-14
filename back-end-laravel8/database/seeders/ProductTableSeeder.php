<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;
        $fake = Faker::create();
        $type=["Hoa quả","thực phẩm khô","rau hữu cơ"];
        for ($i = 0; $i < $limit; $i++) {
            DB::table('products')->insert([
                'nameProduct' => $fake->name,
                'typeProduct' =>$fake->randomElement($type),
                'promotion_price' => $fake->randomFloat(2, 0, 200000),
                'image' =>$fake->image('public/assets/images/products', 400, 300, null, false),
                'describe' => $fake->paragraph,
            ]);
        }
    }
}


