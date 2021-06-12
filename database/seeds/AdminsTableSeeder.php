<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => bcrypt('admin@1234'),
        ]);
        $admin->assignRole(1);
    }
}
