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
            'restaurant_name' =>NULL,
            'restaurant_address' =>NULL,
            'restaurant_telephone' =>NULL,
            'personal_address' =>'12 Three Road, Huddersfield',
            'personal_telephone' =>'99437569',
            'email'=>'admin@hotmail.com',
            'password' => bcrypt('pass')
        ]);
        $manager = User::create([
            'name' =>'Manager',
            'restaurant_name' =>NULL,
            'restaurant_address' =>NULL,
            'restaurant_telephone' =>NULL,
            'personal_address' =>'23 Meat Road, Huddersfield',
            'personal_telephone' =>'99437552',
            'email'=>'manager@hotmail.com',
            'password' => bcrypt('pass')
        ]);
        User::create([
            'name' =>'Customer',
            'restaurant_name' =>'Customer\'s Restaurant',
            'restaurant_address' =>'247 Manchester Road, Huddersfield',
            'restaurant_telephone' =>'25437561',
            'personal_address' =>'3 Olives Road, Huddersfield',
            'personal_telephone' =>'99437561',
            'email'=>'customer@hotmail.com',
            'password' => bcrypt('pass')
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);

    }
}
