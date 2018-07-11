<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
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
        foreach(range(0,10) as $index){
            DB::table('clients')->insert([     
                'user_id' => 16+$index,           
                'company_name' => $faker->company(),
                'address' => $faker->address(),   
                'phone' => $faker->phoneNumber (),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }
    }
}
