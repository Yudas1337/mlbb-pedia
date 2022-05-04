<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $fetch = Http::acceptJson()
            ->get(config('mapi.LIST_HERO_API'));

        $data = collect($fetch['data'])->sortBy('heroID')->toArray();

        foreach ($data as $list) {
            Hero::create([
                'heroid'    => $list['heroID'],
                'name'      => $list['name'],
                'picture'   => $list['image'],
                'hero_role' => 1,
                'hero_type' => 'test'
            ]);
        }
    }
}
