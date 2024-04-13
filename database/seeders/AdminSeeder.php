<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected static ?string $password;
    public function run(): void
    {
        //
        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@aps.com',
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        // ]);
        // $user->assignRole('user');

        $users = User::all();
        foreach ($users as $user) {
            // Assign the role to the user
            $user->assignRole('user');
        }
        $superAdmin = User::where('email', '=', 'simplysuga_aps501@avvaiyarpadasalai.org')->get();
        $user->assignRole('su-admin');

    }
}