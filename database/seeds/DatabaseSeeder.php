<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(MeetingsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(DocpersTableSeeder::class);
        // $this->call(PatientsTableSeeder::class);
        // $this->call(RegistrationsTableSeeder::class);
        // $this->call(DiagnosesTableSeeder::class);
        // $this->call(PrescriptionsTableSeeder::class);
        // $this->call(MedicinesTableSeeder::class);
        // $this->call(MedicinePrescriptionsTableSeeder::class);
        // $this->call(ResultLabTableSeeder::class);
    }
}
