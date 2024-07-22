<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name'          => 'Admin',
            'guard_name'    => 'web'
        ]);

        $list_permission = [
            'User Access',
            'User Create',
            'User Update',
            'User Banned',
            'Role Access',
            'Role Create',
            'Role Update',
            'Role Deleted',
            'Permission Access',
            'Permission Create',
            'Permission Update',
            'Permission Deleted',
            'Barang Access',
            'Barang Create',
            'Barang Update',
            'Barang Deleted',
            'Satuan Access',
            'Satuan Create',
            'Satuan Update',
            'Satuan Deleted',
            'Barang Masuk Access',
            'Barang Masuk Create',
            'Barang Masuk Update',
            'Barang Masuk Deleted',
            'Barang Keluar Access',
            'Barang Keluar Create',
            'Barang Keluar Update',
            'Barang Keluar Deleted',
        ];

        foreach ($list_permission as $value) {
            $permission = Permission::create([
                'name'          => $value,
                'guard_name'    => 'web'
            ]);

            $permission->assignRole($admin);
        }
    }
}
