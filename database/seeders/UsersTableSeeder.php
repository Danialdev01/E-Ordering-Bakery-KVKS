<?php
// database/seeders/UsersTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'secret_number' => '1234'
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'secret_number' => '5678'
            ],
            [
                'name' => 'danialirfan',
                'email' => 'danial@example.com',
                'password' => Hash::make('password'),
                'secret_number' => '9012'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
