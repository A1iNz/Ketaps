<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menggunakan updateOrCreate agar jika seeder dijalankan 2x, 
        // tidak terjadi error duplikat (tetap pakai 1 akun yang sama)
        User::updateOrCreate(
            ['email' => 'admin@siaplulus.com'], // Patokan pencarian
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'), // Ini kata sandinya
                'role' => 'ADMIN',
                'match_score' => 0,
                'xp' => 0,
            ]
        );

        $this->command->info('Akun Admin berhasil dibuat! Email: admin@siaplulus.com | Password: admin123');
    }
}