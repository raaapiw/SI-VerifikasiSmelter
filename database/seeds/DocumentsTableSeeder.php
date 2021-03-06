<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Work;

class DocumentsTableSeeder extends Seeder
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
        $works = Work::all();
        foreach(range(0,10) as $index){
            DB::table('documents')->insert([                
                'work_id' => $index+1,
                'evidence' => $faker->text($maxNbChars = 190), 
                'type' => $faker->text($maxNbChars = 190),
                'state' =>0,
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }
    }
}
