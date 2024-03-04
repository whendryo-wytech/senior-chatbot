<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        UserProfile::truncate();
        User::truncate();
        $user = User::create([
            'name'              => 'admin',
            'email'             => 'whendryo.nascimento@seniornortepr.com.br',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin'),
            'remember_token'    => Str::random(10),
        ]);
        $token = $user->createToken('admin');
        UserProfile::create([
            'user_id' => $user->id,
            'token'   => $token->plainTextToken
        ]);
    }
}
