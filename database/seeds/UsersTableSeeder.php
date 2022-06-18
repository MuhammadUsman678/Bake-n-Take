<?php

use App\Role;
use App\User;
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
        $roles = [
            [
                'role'  => 'Admin'
            ],
            [
                'role'=>'Customer'
            ],[
                'role'=>'Shop'
            ]
        ];

        Role::insert($roles);

        $users = [
            [
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role_id'  =>  1
            ],
            [
                'name'     => 'Customer',
                'email'    => 'customer@gmail.com',
                'password' => bcrypt('password'),
                'role_id'  => 2
            ],
            [
                'name'     => 'Shop',
                'email'    => 'shop@gmail.com',
                'password' => bcrypt('password'),
                'role_id'  => 3
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
