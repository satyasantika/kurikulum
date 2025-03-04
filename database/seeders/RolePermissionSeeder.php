<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data Role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'universitas']);
        Role::create(['name' => 'prodi']);
        Role::create(['name' => 'fakultas']);
        Role::create(['name' => 'dosen']);
        Role::create(['name' => '2103']);
        Role::create(['name' => '2121']);
        Role::create(['name' => '2122']);
        Role::create(['name' => '2151']);
        Role::create(['name' => '2153']);
        Role::create(['name' => '2154']);
        Role::create(['name' => '2165']);
        Role::create(['name' => '2170']);
        Role::create(['name' => '2171']);
        Role::create(['name' => '2191']);
        // data Permission
        Permission::create(['name' => 'active'])->assignRole('admin');
        Permission::create(['name' => 'access dashboard admin'])->assignRole('admin');
        Permission::create(['name' => 'access dashboard universitas'])->assignRole('universitas');
        Permission::create(['name' => 'access dashboard fakultas'])->assignRole('fakultas');
        Permission::create(['name' => 'access dashboard prodi'])->assignRole('prodi');
        Permission::create(['name' => 'access dashboard dosen'])->assignRole('dosen');

        Permission::create(['name' => 'read roles'])->assignRole('admin');
        Permission::create(['name' => 'create roles'])->assignRole('admin');
        Permission::create(['name' => 'update roles'])->assignRole('admin');
        Permission::create(['name' => 'delete roles'])->assignRole('admin');

        Permission::create(['name' => 'read permissions'])->assignRole('admin');
        Permission::create(['name' => 'create permissions'])->assignRole('admin');
        Permission::create(['name' => 'update permissions'])->assignRole('admin');
        Permission::create(['name' => 'delete permissions'])->assignRole('admin');

        Permission::create(['name' => 'read users'])->assignRole('admin');
        Permission::create(['name' => 'create users'])->assignRole('admin');
        Permission::create(['name' => 'update users'])->assignRole('admin');
        Permission::create(['name' => 'delete users'])->assignRole('admin');

        Permission::create(['name' => 'read navigations'])->assignRole('admin');
        Permission::create(['name' => 'create navigations'])->assignRole('admin');
        Permission::create(['name' => 'update navigations'])->assignRole('admin');
        Permission::create(['name' => 'delete navigations'])->assignRole('admin');

        Permission::create(['name' => 'access setting/roles'])->assignRole('admin');
        Permission::create(['name' => 'access setting/permissions'])->assignRole('admin');
        Permission::create(['name' => 'access setting/users'])->assignRole('admin');
        Permission::create(['name' => 'access setting/navigations'])->assignRole('admin');

        Permission::create(['name' => 'access prodi/profil'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/cpl'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/bk'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/mk'])->assignRole('prodi');

        Permission::create(['name' => 'access dosen/cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/subcpmk'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/pertemuan'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/kuliah'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/evaluasi'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/cpl'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/bk'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/mk'])->assignRole('dosen');
    }
}
