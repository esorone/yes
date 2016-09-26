<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_gebruiker = Role::where('name', 'User')->first();
        $role_author = Role::where('name', 'Auteur')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'Bezoeker';
        $user->email = 'Bezoeker@example.com';
        $user->password = bcrypt('Bezoeker');
        $user->save();
        $user->roles()->attach($role_gebruiker);

        $admin = new User();
        $admin->name = 'Lennard';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->name = 'Hans';
        $author->email = 'auteur@example.com';
        $author->password = bcrypt('author');
        $author->save();
        $author->roles()->attach($role_author);
    }
}