<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Order;

class MeetingsTableSeeder extends Seeder
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
            DB::table('meetings')->insert([                
                'order_id' => $index+1,
                'bap' => $faker->text($maxNbChars = 190),  
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'),   
                'time' => $faker->time($format = 'H:i:s', $max = 'now'),
                'place' => $faker->text($maxNbChars = 190),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }
    }
}
