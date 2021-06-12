<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();

    	DB::table('model_has_roles')->truncate();

        DB::table('permissions')->truncate();

        $admin = Role::where('name', 'ADMIN')->first();

    	DB::table('permissions')->insert([
            ['name' => 'draft-view','display_name' => 'Drafts View', 'guard_name' => 'admin'],
            ['name' => 'status-change', 'display_name' => 'Customer Status Change', 'guard_name' => 'admin'],
            ['name' => 'approved-view', 'display_name' => 'Approved Customers', 'guard_name' => 'admin'],
            ['name' => 'rejected-view', 'display_name' => 'Rejected Customers', 'guard_name' => 'admin'],
            ['name' => 'subadmin-create', 'display_name' => 'SubAdmin Create', 'guard_name' => 'admin'],
            ['name' => 'subadmin-view', 'display_name' => 'SubAdmin View', 'guard_name' => 'admin'],
            ['name' => 'subadmin-edit', 'display_name' => 'SubAdmin Edit', 'guard_name' => 'admin'],
            ['name' => 'role-create', 'display_name' => 'Role Create', 'guard_name' => 'admin'],
            ['name' => 'role-view', 'display_name' => 'Role View', 'guard_name' => 'admin'],
            ['name' => 'role-edit', 'display_name' => 'Role Edit', 'guard_name' => 'admin'],

            ]);

            $admin_permissions = Permission::select('id')->get();
    
            $admin->syncPermissions($admin_permissions->toArray());
    
            $permission = [];
    
            foreach ($admin_permissions as $admin_permission) {
                $permission[] = $admin_permission->id;
            }

            Schema::enableForeignKeyConstraints();
        }
    }
                