<?php

namespace Database\Seeders;

use App\Models\Lane;
use Illuminate\Database\Seeder;

class LaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Gold Lane', 'Exp Lane', 'Mid Lane', 'Jungling', 'Roaming'];
        foreach ($array as $list) {
            Lane::create([
                'name'  => $list
            ]);
        }
    }
}
