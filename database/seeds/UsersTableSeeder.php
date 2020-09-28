<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidp6k ,z
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

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Marketing',
                'slug'        => 'marketing',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Management',
                'slug'        => 'management',
            ]
        );
    }

    public function createUser()
    {
        $this->createDefaultSuperAdmin();
        $this->createDefaultAdmin();
        $this->createDefaultZul();
        $this->createDefaultAni();
        $this->createDefaultSuk();
        $this->createDefaultOzi();
        $this->createDefaultAti();
        $this->createDefaultMinerba();
        $this->createDefaultClient();
        $this->createDefaultMarketing();
        $this->createDefaultManagement();
        
        $roleArray = array("admin", "minerba");
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
            $role = Sentinel::findRoleBySlug('client');
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
			'email' => 'verifikasismelter.ptsi@gmail.com',
            'password' => 'qwerty123',
            'name' => 'Admin',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultZul(){
        $credentials = [
            'username' => 'zulkifli',
			'email' => 'zk.mubar@gmail.com',
            'password' => 'zul123',
            'name' => 'Zulkifli Kurais Mubar',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultAni(){
        $credentials = [
            'username' => 'Ani',
			'email' => 'anynovyant@gmail.com',
            'password' => 'ani123',
            'name' => 'Ani Novyanti',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultOzi(){
        $credentials = [
            'username' => 'ozi',
			'email' => '.com',
            'password' => 'ozi123',
            'name' => 'Fauzie',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultAti(){
        $credentials = [
            'username' => 'nurhayati',
			'email' => 'nurhayatisurbakti@gmail.com',
            'password' => 'ati123',
            'name' => 'Nurhayati Surbakti',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultSuk(){
        $credentials = [
            'username' => 'sukma',
			'email' => 'sukmaaulia@gmail.com',
            'password' => 'suk123',
            'name' => 'Sukma Aulia',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultHelmy(){
        $credentials = [
            'username' => 'helmy',
			'email' => 'helmysatriayudha@gmail.com',
            'password' => '123',
            'name' => 'Helmy S. Yudha',
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

    public function createDefaultMarketing(){
        $credentials = [
            'username' => 'marketingminba',
			'email' => 'marketing@example.com',
            'password' => 'hargaharusmahal',
            'name' => 'Vienna',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('marketing');
        $user->roles()->attach($role);
    }

    public function createDefaultManagement(){
        $credentials = [
            'username' => 'managementminba',
			'email' => 'management@example.com',
            'password' => 'management123',
            'name' => 'Management',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('management');
        $user->roles()->attach($role);
    }
}
