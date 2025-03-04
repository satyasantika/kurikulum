<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name','admin')->first();
        $prodi = Role::where('name','prodi')->first();
        $dosen = Role::where('name','dosen')->first();
        // data User
        User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('asdfasdf')
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Pendidikan Matematika',
            'username' => 'kaprodimat',
            'password' => bcrypt('1234'),
            'email' => 'mat@unsil.ac.id',
        ])->assignRole('prodi')->assignRole('2151');

        User::factory()->create([
            'name' => 'Dosen Pendidikan Matematika',
            'username' => 'dosenmat',
            'password' => bcrypt('1234'),
            'email' => 'dosen@unsil.ac.id',
        ])->assignRole('dosen')->assignRole('2151');

    }
}
