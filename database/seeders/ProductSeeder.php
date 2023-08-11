<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i<5;$i++){
            product::create([
                'product' => 'product '.Str::random(4),
                'rgPrice' => 100,
                'slPrice' => 60,
                'prodImg' => 'defaulticon.png',
                'type' => 'Non-Veg',
                'tags' => ''
            ]);
        }
        
    }
}
