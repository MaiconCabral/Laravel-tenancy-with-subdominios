<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'name'      => 'Main',
            'subdomain' => 'main',
            'color'     => '#111827',
            'folder'    => 'main',
        ]);
        Tenant::create([
            'name'      => 'Portal Geek',
            'subdomain' => 'geek',
            'color'     => '#18181b',
            'folder'    => 'geek',
        ]);
        Tenant::create([
            'name'      => 'Guitar world',
            'subdomain' => 'guitar',
            'color'     => '#ececec',
            'folder'    => 'guitar',
        ]);
    }
}
