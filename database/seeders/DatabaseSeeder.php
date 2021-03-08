<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        Role::create(['name' => 'admin']);
        $roleAdmin = Role::create(['name' => 'superadmin']);

        $user = \App\Models\User::create([
            'name' => 'administrador',
            'ap_paterno' => '',
            'ap_materno' => '',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole($roleAdmin);
    }
}
