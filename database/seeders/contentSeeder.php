<?php

namespace Database\Seeders;

use App\Models\kyojin;
use App\Models\news;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kyojin::create([
            'image' => 'http://assets.kompasiana.com/items/album/2022/05/30/eren-yeager-1-6294723353e2c32b47142933.jpg',
            'name' => 'Eren Yeager',
            'species' => 'Human',
            'gender' => 'Male',
            'height' => '165',
            'weight' => '75',
            'birthday' => '1990-08-08',
            'description' => 'Eren Yeager, named Eren Jaeger in the subtitled and dubbed versions of the anime Attack on Titan, is a fictional character and the protagonist of the Attack on Titan manga series created by Hajime Isayama.'
        ]);

        news::create([
            'image' => 'https://miro.medium.com/max/2560/1*7e8qoT5T26S5PTf568frrg.jpeg',
            'article' => 'Season 1'
        ]);

        news::create([
            'image' => 'https://i1.sndcdn.com/artworks-000215769195-uj8z0s-t500x500.jpg',
            'article' => 'Season 2'
        ]);

        news::create([
            'image' => 'https://cdn.myanimelist.net/images/anime/1173/92110.jpg',
            'article' => 'Season 3 Part 1'
        ]);

        news::create([
            'image' => 'https://www.gwigwi.com/wp-content/uploads/2020/12/cover-shingeki-no-kyojin-3-part-2.jpg',
            'article' => 'Season 3 Part 2'
        ]);

        news::create([
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2cobR2nNroXjmk3ICdP1bWl-LAKCk8OOEI84vloRfrewQfRtjZwDFBfVPZpy7BQiwlHs&usqp=CAU',
            'article' => 'Season 4 Part 1'
        ]);
    }
}
