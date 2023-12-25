<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Admin Seeder
         $user = User::create([
            'first_name' => 'Sortie',
            'last_name' => 'Developer',
            'email' => 'admin@sortieservices.in',
            'mobile' => '7004857557',
            'user_type' => 'admin',
            'password' => bcrypt('12345678')
        ]);

        $user2 = User::create([
            'first_name' => 'Ranjan',
            'last_name' => 'raj',
            'email' => 'ranjan@gmail.com',
            'mobile' => '7004857558',
            'user_type' => 'admin',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Admin','guard_name' => 'web']);
        $role2 = Role::create(['name' => 'Manager','guard_name' => 'web']);
        $role3 = Role::create(['name' => 'Supervisor','guard_name' => 'web']);
        $role4 = Role::create(['name' => 'Executive','guard_name' => 'web']);
        $role4 = Role::create(['name' => 'User','guard_name' => 'api']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        $user2->assignRole([$role->id]);
    }

}
