<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name"      => "Kasir",
            "email"     => "kasir@kasir.com",
            "password"  => Hash::make("kasir12"),
            "role_id"   => 1,
        ]);
    }
}
