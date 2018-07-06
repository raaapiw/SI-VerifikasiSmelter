<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Client;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $clients = Client::all();
        foreach(range(0,10) as $index){
            DB::table('orders')->insert([                
                'client_id' => $index+1,
                'offer_letter' => $faker->text($maxNbChars = 190),
                'dp_invoice' => $faker->text($maxNbChars = 190), 
                'transfer_proof' => $faker->text($maxNbChars = 190),
                'companion_letter' => $faker->text($maxNbChars = 190),  
                'letter_of_request' => $faker->text($maxNbChars = 190),  
                'spk' => $faker->text($maxNbChars = 190),  
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }

    }
}
