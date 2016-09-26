<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_gebruiker = new Role();
        $role_gebruiker->name = 'User';
        $role_gebruiker->description = 'Normale gebruiker';
        $role_gebruiker->save();

        $role_author = new Role();
        $role_author->name = 'Author';
        $role_author->description = 'Een auteur';
        $role_author->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Is een admin';
        $role_admin->save();
    }
}