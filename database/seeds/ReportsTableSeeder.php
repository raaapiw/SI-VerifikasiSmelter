<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Order;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $orders = Order::all();
        foreach(range(0,10) as $index){
            DB::table('reports')->insert([               
                'order_id' => $index+1,    
                'report' => $faker->text($maxNbChars = 190),
                'covering_letter' => $faker->text($maxNbChars = 190), 
                'receipt' => $faker->text($maxNbChars = 190),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }
    }
}
