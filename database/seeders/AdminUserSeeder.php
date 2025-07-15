<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        AdminUser::updateOrCreate(
            ['username' => 'admin'],
            ['password' => Hash::make('admin123')]
        );
    }
}
