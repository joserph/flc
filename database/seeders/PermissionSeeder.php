<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Category
            'View Category',
            'Create Category',
            'Update Category',
            'Delete Category',
            // Comment
            'View Comment',
            'Create Comment',
            'Update Comment',
            'Delete Comment',
            // Permission
            'View Permission',
            'Create Permission',
            'Update Permission',
            'Delete Permission',
            // Post
            'View Post',
            'Create Post',
            'Update Post',
            'Delete Post',
            // Role
            'View Role',
            'Create Role',
            'Update Role',
            'Delete Role',
            // User
            'View User',
            'Create User',
            'Update User',
            'Delete User',
        ];
        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }
        // Create Super Admin
        $userAdmin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('admin')
        ]);
        $rolAdmin = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);
        
        $rolAdmin = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web'
        ]);

        // Table role_user
        $userAdmin->roles()->sync([$rolAdmin->id]);
    }
}
