<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'nu.ru@yahoo.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'phone' => '088808011818',
        ]);

        // seeder profile_clinics manual
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Pratama Antam',
            'address' => 'Antam Office Building Tower A, Jl. TB. Simatupang No.1 Jagakarsa, Jakarta Selatan 12530',
            'phone' => '1234567890',
            'email' => 'klinikpratama@antam.com',
            'doctor_name' => 'dr. Khadijah',
            'unique_code' => '1234567',
        ]);

        //call
        $this->call(DoctorSeeder::class);
    }
}
