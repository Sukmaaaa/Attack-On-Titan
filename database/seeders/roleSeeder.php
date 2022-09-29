<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view-character']);
        Permission::create(['name' => 'create-character']);
        Permission::create(['name' => 'edit-character']);
        Permission::create(['name' => 'delete-character']);

        Permission::create(['name' => 'view-news']);
        Permission::create(['name' => 'create-news']);
        Permission::create(['name' => 'edit-news']);
        Permission::create(['name' => 'delete-news']);

        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'view-roles']);
        Permission::create(['name' => 'create-roles']);
        Permission::create(['name' => 'edit-roles']);
        Permission::create(['name' => 'delete-roles']);

        Permission::create(['name' => 'view-series']);
        Permission::create(['name' => 'create-series']);
        Permission::create(['name' => 'edit-series']);
        Permission::create(['name' => 'delete-series']);

        Permission::create(['name' => 'view-episode']);
        Permission::create(['name' => 'create-episode']);
        Permission::create(['name' => 'edit-episode']);
        Permission::create(['name' => 'delete-episode']);


        Permission::create(['name' => 'view-genre']);
        Permission::create(['name' => 'create-genre']);
        Permission::create(['name' => 'edit-genre']);
        Permission::create(['name' => 'delete-genre']);

        Permission::create(['name' => 'view-anime']);
        Permission::create(['name' => 'create-anime']);
        Permission::create(['name' => 'edit-anime']);
        Permission::create(['name' => 'delete-anime']);
        
        Permission::create(['name' => 'view-audits']);
        
        $superAdmin = Role::create([
            'name' => 'super admin',
            'guard_name' => 'web'
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $superAdmin->givePermissionTo([
            // character
            'view-character',
            'create-character',
            'edit-character',
            'delete-character',
            // series
            'view-series',
            'create-series',
            'edit-series',
            'delete-series',
            // episode
            'view-episode',
            'create-episode',
            'edit-episode',
            'delete-episode',
            // news
            'view-news',
            'create-news',
            'edit-news',
            'delete-news',
            // users
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            // roles
            'view-roles',
            'create-roles',
            'edit-roles',
            'delete-roles',
            // genre
            'view-genre',
            'create-genre',
            'edit-genre',
            'delete-genre',
            // anime
            'view-anime',
            'create-anime',
            'edit-anime',
            'delete-anime',
            // audits
            'view-audits',
        ]);

        $admin->givePermissionTo([
            // character
            'view-character',
            'create-character',
            'edit-character',
            'delete-character',
            // series
            'view-series',
            'create-series',
            'edit-series',
            'delete-series',
            // episode
            'view-episode',
            'create-episode',
            'edit-episode',
            'delete-episode',
            // news
            'view-news',
            'create-news',
            'edit-news',
            'delete-news',
            // users
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            // roles
            'view-roles',
            'create-roles',
            'edit-roles',
            'delete-roles',
            // genre
            'view-genre',
            'create-genre',
            'edit-genre',
            'delete-genre',
            // anime
            'view-anime',
            'create-anime',
            'edit-anime',
            'delete-anime',
            // audits
            'view-audits',
        ]);

        $user->givePermissionTo([
            'view-character',
            'view-series',
            'view-episode',
            'edit-character',
            'view-news',
            'edit-news',
        ]);

    }
}
