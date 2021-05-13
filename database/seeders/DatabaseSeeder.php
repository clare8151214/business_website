<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['title'=>'測試資料','content'=>'adfa','price' => rand(0,300),'quantity'=>20]);
        Product::create(['title'=>'測試資料2','content'=>'adfa','price' => rand(0,300),'quantity'=>20]);
        Product::create(['title'=>'測試資料3','content'=>'adfa','price' => rand(0,300),'quantity'=>20]);
        $this->call(ProductSeeder::class);
        $this->command->info('產生固定資料');
    }
}
