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
                'evidence' => 0, 
                'type' => rand(1,6),
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now')       
            ]);
        }
    }
}
