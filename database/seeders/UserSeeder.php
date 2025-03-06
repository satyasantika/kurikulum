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
        ])->syncRoles(['prodi','2151']);

        User::factory()->create([
            'name' => 'Dosen Pendidikan Matematika',
            'username' => 'dosenmat',
            'password' => bcrypt('1234'),
            'email' => 'dosen@unsil.ac.id',
        ])->syncRoles(['dosen','2151']);

    }
}
