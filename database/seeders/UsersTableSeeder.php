<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name'     => 'Maicon Cabral',
            'email'    => 'maiconcabral.mcm@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        // User::create([
        //     'tenant_id'=> $tenant->id,
        //     'name'     => 'Maicon Cabral',
        //     'email'    => 'maiconcabral.mcm@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
    }
}
