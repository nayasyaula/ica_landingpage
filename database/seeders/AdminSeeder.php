<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@ica.com',
            'password' => Hash::make('password123'),
            'phone' => '08123456789',
            'is_super_admin' => true,
        ]);
    }
}