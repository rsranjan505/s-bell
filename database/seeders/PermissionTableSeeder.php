<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'can-user-list',
            'can-user-create',
            'can-user-edit',
            'can-user-delete',
            'can-user-view',
            'can-user-status-change',
            'can-role-list',
            'can-role-create',
            'can-role-edit',
            'can-role-delete',
            'can-role-status-change',
            'can-product-list',
            'can-product-create',
            'can-product-edit',
            'can-product-delete',
            'can-product-status-change',
            'can-order-list',
            'can-order-create',
            'can-order-edit',
            'can-order-delete',
            'can-order-status-change',
            'can-team-list',
            'can-team-create',
            'can-team-edit',
            'can-team-delete',
            'can-team-status-change',
            'can-department-list',
            'can-department-create',
            'can-department-edit',
            'can-department-delete',
            'can-department-status-change',
            'can-designation-list',
            'can-designation-create',
            'can-designation-edit',
            'can-designation-delete',
            'can-designation-status-change',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
