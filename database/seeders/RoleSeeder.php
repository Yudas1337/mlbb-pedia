<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Tank', 'Fighter', 'Assassin', 'Mage', 'Marksman', 'Support'];
        foreach ($array as $list) {
            Role::create([
                'name'  => $list
            ]);
        }
    }
}
