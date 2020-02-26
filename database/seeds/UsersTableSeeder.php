<?php
use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::where('name','admin')->first();
        $managerRole = Role::where('name','manager')->first();


        $admin = User::create([
            'name' =>'Admin',
            'email'=>'admin@hotmail.com',
            'password' => bcrypt('pass')
        ]);
        $manager = User::create([
            'name' =>'Manager',
            'email'=>'manager@hotmail.com',
            'password' => bcrypt('pass')
        ]);
        User::create([
            'name' =>'Customer',
            'email'=>'customer@hotmail.com',
            'password' => bcrypt('pass')
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
       
    }
}
