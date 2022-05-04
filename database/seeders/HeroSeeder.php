<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
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
        $url = config('mapi.LIST_HERO_API');
        $fetch = Http::acceptJson()->get($url);

        foreach ($fetch['data'] as $list) {
            $find = Hero::where('heroid', $list['heroID'])->first();
            if (!$find) {
                Hero::updateOrCreate(
                    ['heroid' => $list['heroID']],
                    [
                        'heroid'    => $list['heroID'],
                        'name'      => $list['name'],
                        'picture'   => $list['image'],
                        'hero_role' => Arr::random([5, 6]),
                        'hero_type' => 'test'
                    ]
                );
            }
        }
    }
}
