<?php

namespace Database\Seeders;

use App\Models\MatchMaking;
use Illuminate\Database\Seeder;

class MatchMakingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['mode' => 'Ranked Mode', 'total_ban' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['mode' => 'MCL', 'total_ban' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['mode' => 'Tournament', 'total_ban' => 10, 'created_at' => now(), 'updated_at' => now()]
        ];

        MatchMaking::insert($array);
    }
}
