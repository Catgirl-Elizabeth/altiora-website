<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Moderator', 'Operations Staff', 'Outreach Staff', 'Den Manager', 'Community Staff', 'Coach', 'Artist', 'Team Manager', 'Tournament Staff'];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'role_name' => $role
            ]);
        }
    }
}
