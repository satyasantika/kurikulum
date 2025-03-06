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
        Role::create(['name' => '2151']);
        // data Permission
        Permission::create(['name' => 'active'])->syncRoles(['admin','prodi','dosen']);
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

        Permission::create(['name' => 'read identitas prodi'])->syncRoles(['admin','prodi']);
        Permission::create(['name' => 'create identitas prodi'])->assignRole('admin');
        Permission::create(['name' => 'update identitas prodi'])->syncRoles(['admin','prodi']);
        Permission::create(['name' => 'delete identitas prodi'])->assignRole('admin');

        Permission::create(['name' => 'read kurikulum'])->assignRole('prodi');
        Permission::create(['name' => 'create kurikulum'])->assignRole('prodi');
        Permission::create(['name' => 'update kurikulum'])->assignRole('prodi');
        Permission::create(['name' => 'delete kurikulum'])->assignRole('prodi');

        Permission::create(['name' => 'read profil lulusan'])->assignRole('prodi');
        Permission::create(['name' => 'create profil lulusan'])->assignRole('prodi');
        Permission::create(['name' => 'update profil lulusan'])->assignRole('prodi');
        Permission::create(['name' => 'delete profil lulusan'])->assignRole('prodi');

        Permission::create(['name' => 'read indikator profil'])->assignRole('prodi');
        Permission::create(['name' => 'create indikator profil'])->assignRole('prodi');
        Permission::create(['name' => 'update indikator profil'])->assignRole('prodi');
        Permission::create(['name' => 'delete indikator profil'])->assignRole('prodi');

        Permission::create(['name' => 'read cpls'])->assignRole('prodi');
        Permission::create(['name' => 'create cpls'])->assignRole('prodi');
        Permission::create(['name' => 'update cpls'])->assignRole('prodi');
        Permission::create(['name' => 'delete cpls'])->assignRole('prodi');

        Permission::create(['name' => 'read join profil-cpl'])->assignRole('prodi');
        Permission::create(['name' => 'create join profil-cpl'])->assignRole('prodi');
        Permission::create(['name' => 'update join profil-cpl'])->assignRole('prodi');
        Permission::create(['name' => 'delete join profil-cpl'])->assignRole('prodi');

        Permission::create(['name' => 'read bk'])->assignRole('prodi');
        Permission::create(['name' => 'create bk'])->assignRole('prodi');
        Permission::create(['name' => 'update bk'])->assignRole('prodi');
        Permission::create(['name' => 'delete bk'])->assignRole('prodi');

        Permission::create(['name' => 'read join cpl-bk'])->assignRole('prodi');
        Permission::create(['name' => 'create join cpl-bk'])->assignRole('prodi');
        Permission::create(['name' => 'update join cpl-bk'])->assignRole('prodi');
        Permission::create(['name' => 'delete join cpl-bk'])->assignRole('prodi');

        Permission::create(['name' => 'read mk'])->assignRole('prodi');
        Permission::create(['name' => 'create mk'])->assignRole('prodi');
        Permission::create(['name' => 'update mk'])->assignRole('prodi');
        Permission::create(['name' => 'delete mk'])->assignRole('prodi');

        Permission::create(['name' => 'read join mk-dosen'])->assignRole('prodi');
        Permission::create(['name' => 'create join mk-dosen'])->assignRole('prodi');
        Permission::create(['name' => 'update join mk-dosen'])->assignRole('prodi');
        Permission::create(['name' => 'delete join mk-dosen'])->assignRole('prodi');

        Permission::create(['name' => 'read join cpl-mk'])->assignRole('prodi');
        Permission::create(['name' => 'create join cpl-mk'])->assignRole('prodi');
        Permission::create(['name' => 'update join cpl-mk'])->assignRole('prodi');
        Permission::create(['name' => 'delete join cpl-mk'])->assignRole('prodi');

        Permission::create(['name' => 'read bentuk perkuliahan'])->assignRole('prodi');
        Permission::create(['name' => 'create bentuk perkuliahan'])->assignRole('prodi');
        Permission::create(['name' => 'update bentuk perkuliahan'])->assignRole('prodi');
        Permission::create(['name' => 'delete bentuk perkuliahan'])->assignRole('prodi');

        Permission::create(['name' => 'read bentuk evaluasi'])->assignRole('prodi');
        Permission::create(['name' => 'create bentuk evaluasi'])->assignRole('prodi');
        Permission::create(['name' => 'update bentuk evaluasi'])->assignRole('prodi');
        Permission::create(['name' => 'delete bentuk evaluasi'])->assignRole('prodi');

        Permission::create(['name' => 'read cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'create cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'update cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'delete cpmk'])->assignRole('dosen');

        Permission::create(['name' => 'read join mk-cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'create join mk-cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'update join mk-cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'delete join mk-cpmk'])->assignRole('dosen');

        Permission::create(['name' => 'read join cpl-cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'create join cpl-cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'update join cpl-cpmk'])->assignRole('dosen');
        Permission::create(['name' => 'delete join cpl-cpmk'])->assignRole('dosen');

        Permission::create(['name' => 'read subcpmk'])->assignRole('dosen');
        Permission::create(['name' => 'create subcpmk'])->assignRole('dosen');
        Permission::create(['name' => 'update subcpmk'])->assignRole('dosen');
        Permission::create(['name' => 'delete subcpmk'])->assignRole('dosen');

        Permission::create(['name' => 'read kuliah'])->assignRole('dosen');
        Permission::create(['name' => 'create kuliah'])->assignRole('dosen');
        Permission::create(['name' => 'update kuliah'])->assignRole('dosen');
        Permission::create(['name' => 'delete kuliah'])->assignRole('dosen');

        Permission::create(['name' => 'read join perkuliahan-dosen'])->assignRole('dosen');
        Permission::create(['name' => 'create join perkuliahan-dosen'])->assignRole('dosen');
        Permission::create(['name' => 'update join perkuliahan-dosen'])->assignRole('dosen');
        Permission::create(['name' => 'delete join perkuliahan-dosen'])->assignRole('dosen');

        Permission::create(['name' => 'read join perkuliahan-submateri'])->assignRole('dosen');
        Permission::create(['name' => 'create join perkuliahan-submateri'])->assignRole('dosen');
        Permission::create(['name' => 'update join perkuliahan-submateri'])->assignRole('dosen');
        Permission::create(['name' => 'delete join perkuliahan-submateri'])->assignRole('dosen');

        Permission::create(['name' => 'read join perkuliahan-bentukperkuliahan'])->assignRole('dosen');
        Permission::create(['name' => 'create join perkuliahan-bentukperkuliahan'])->assignRole('dosen');
        Permission::create(['name' => 'update join perkuliahan-bentukperkuliahan'])->assignRole('dosen');
        Permission::create(['name' => 'delete join perkuliahan-bentukperkuliahan'])->assignRole('dosen');

        Permission::create(['name' => 'read bentuk evaluasi perkuliahan'])->assignRole('dosen');
        Permission::create(['name' => 'update bentuk evaluasi perkuliahan'])->assignRole('dosen');
        Permission::create(['name' => 'create bentuk evaluasi perkuliahan'])->assignRole('dosen');
        Permission::create(['name' => 'delete bentuk evaluasi perkuliahan'])->assignRole('dosen');

        Permission::create(['name' => 'read join perkuliahan-evaluasi'])->assignRole('dosen');
        Permission::create(['name' => 'create join perkuliahan-evaluasi'])->assignRole('dosen');
        Permission::create(['name' => 'update join perkuliahan-evaluasi'])->assignRole('dosen');
        Permission::create(['name' => 'delete join perkuliahan-evaluasi'])->assignRole('dosen');

        Permission::create(['name' => 'read join perkuliahan-berkas'])->assignRole('dosen');
        Permission::create(['name' => 'create join perkuliahan-berkas'])->assignRole('dosen');
        Permission::create(['name' => 'update join perkuliahan-berkas'])->assignRole('dosen');
        Permission::create(['name' => 'delete join perkuliahan-berkas'])->assignRole('dosen');

        Permission::create(['name' => 'access setting/roles'])->assignRole('admin');
        Permission::create(['name' => 'access setting/permissions'])->assignRole('admin');
        Permission::create(['name' => 'access setting/users'])->assignRole('admin');
        Permission::create(['name' => 'access setting/navigations'])->assignRole('admin');

        Permission::create(['name' => 'access setting/prodis'])->syncRoles(['admin','prodi']);

        Permission::create(['name' => 'access prodi/kurikulums'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/profils'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/profilindikators'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/cpls'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/joinprofilcpls'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/bks'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/joincplbks'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/mks'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/joinmkdosens'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/joinbkmks'])->assignRole('prodi');
        Permission::create(['name' => 'access prodi/joincplmks'])->assignRole('prodi');

        Permission::create(['name' => 'access dosen/cpmks'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/joinmkcpmks'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/subcpmks'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/kuliahs'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/joinkuliahdosens'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/joinkuliahsubmateris'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/bentukkuliahs'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/joinkuliahbentuks'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/bentukevaluasis'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/joinkuliahevaluasis'])->assignRole('dosen');
        Permission::create(['name' => 'access dosen/joinkuliahberkass'])->assignRole('dosen');
    }
}
