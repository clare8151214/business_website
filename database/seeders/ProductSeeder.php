<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::upsert([
            ['id'=>'12','title'=>'固定資料','content'=>'adfa','price' => rand(0,300),'quantity'=>20],
            ['id'=>'14','title'=>'固定資料','content'=>'adfa','price' => rand(0,300),'quantity'=>20]
        ],['id'],['price','quantity']);
    }
}
