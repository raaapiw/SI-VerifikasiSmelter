<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createRoles();
        $this->createUser();
    }

    public function createRoles()
    {
        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'SuperAdmin',
                'slug'        => 'superAdmin',
            ]
        );
        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Admin',
                'slug'        => 'admin',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Minerba',
                'slug'        => 'minerba',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Client',
                'slug'        => 'client',
            ]
        );
    }

    public function createUser()
    {
        $this->createDefaultSuperAdmin();
        $this->createDefaultAdmin();
        $this->createDefaultMinerba();
        $this->createDefaultClient();
        
        $roleArray = array("admin", "minerba", "client");
        foreach(range(0,10) as $index){
            $faker = Faker::create();
            $credentials = [
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => 'qwerty123',
                'name' => $faker->name,
                'gender' => 'M',
            ];

            $user = Sentinel::registerAndActivate($credentials);
            $role = Sentinel::findRoleBySlug($roleArray[array_rand($roleArray)]);
            $user->roles()->attach($role);
        }
    }

    public function createDefaultSuperAdmin(){
        $credentials = [
            'username' => 'superAdmin',
			'email' => 'superAdmin@example.com',
            'password' => 'qwerty123',
            'name' => 'SuperAdmin',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('superAdmin');
        $user->roles()->attach($role);
    }

    public function createDefaultAdmin(){
        $credentials = [
            'username' => 'admin',
			'email' => 'admin@example.com',
            'password' => 'qwerty123',
            'name' => 'Admin',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultClient(){
        $credentials = [
            'username' => 'client',
			'email' => 'client@example.com',
            'password' => 'qwerty123',
            'name' => 'Client',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('client');
        $user->roles()->attach($role);
    }
    
    public function createDefaultMinerba(){
        $credentials = [
            'username' => 'minerba',
			'email' => 'minerba@example.com',
            'password' => 'qwerty123',
            'name' => 'Minerba',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('minerba');
        $user->roles()->attach($role);
    }
}
