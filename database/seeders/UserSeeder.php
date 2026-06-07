<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */    
    public function run(): void
    {
        $json = File::get(database_path('json/users.json'));

        $users = collect(json_decode($json));

        $users->each(function ($user) {
    User::create([
        'name' => $user->name,
        'email' => $user->email,
        'age' => $user->age,
        'city' => $user->city,
        'password' => bcrypt('password123'), // ✅ ADD THIS
    ]);
});
    }
}