<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            ['name' => 'ADMIN', 'guard_name' => 'admin'],
        ]);
        
        Schema::enableForeignKeyConstraints();
    }
}
