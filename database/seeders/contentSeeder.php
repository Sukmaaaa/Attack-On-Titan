<?php

namespace Database\Seeders;

use App\Models\kyojin;
use App\Models\news;
use App\Models\Genre;
use App\Models\episode;
use Carbon\Carbon;
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

         // 'cover', 'trailer', 'title', 'series' , 'article',  'countryOfOrigin', 'originalNetwork', 'originalRelease

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

        // GENRE
        genre::create([
            'name' => 'Comedy',
            'name' => 'Sci-Fi',
            'name' => 'Horror',
            'name' => 'Thriller',
            'name' => 'Magic',
            'name' => 'Supernatural',
            'name' => 'Sports',
            'name' => 'Adventure',
            'name' => 'School life',
            'name' => 'Slice of life',
            'name' => 'Drama',
            'name' => 'Post apocalypse',
            'name' => 'Fantasy',
            'name' => 'Action',
            'name' => 'Romances'
        ]);

        // EPISODE
        episode::create([
            'titleCard' => 'https://static.wikia.nocookie.net/shingekinokyojin/images/d/df/Attack_on_Titan_-_Episode_1_Title_Card.png',
            'noInSeason' => '1',
            'title' => 'To You, in 2000 Years: The Fall of Shiganshina, Part 1',
            'directedBy' => 'Hiroyuki Tanaka, Tetsurō Araki',
            'writenBy' => 'Yasuko Kobayashi',
            'description' => 'For over a century, humans have been living in settlements surrounded by three 50m gigantic walls, Wall Maria, Wall Rose and Wall Sina, which prevent the Titans, giant humanoid creatures who eat humans, from entering. Eren Jaeger, of the town called the Shiganshina District, wishes to see the outside world by joining the Scout Regiment, as he likens living in the cities to livestock. Despite this, his friend Mikasa Ackermann and their mother Carla Jaeger are against him joining the Scouts. Even after seeing the Scouts return home with large casualties, Eren expresses his interest to join, which impresses his father Grisha Jaeger, who promises to show him what lies in their basement once he returns. After Eren and Mikasa rescue their friend Armin Arlert from a group of delinquents, the Colossal Titan, a 60m Titan, suddenly appears and knocks down the gate to the Shiganshina District, which lies in the outer edge of Wall Maria, allowing smaller Titans to enter. As the town erupts into mass panic, Eren and Mikasa rush back to their house, only to see Carla pinned under their collapsed house. As a Smiling Titan approaches them, Carla begs them to flee, but they refuse until city guard Hannes arrives and assures them that he will defend them. However, as he charges towards the Titan, he is overcome with fear and takes Eren and Mikasa away. Eren watches in horror as a Smiling Titan eats Carla',
            'originalAirDate' => Carbon::parse('2013-11-07')
        ]);
    }
}
