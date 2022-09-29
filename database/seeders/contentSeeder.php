<?php

namespace Database\Seeders;

use App\Models\anime;
use App\Models\kyojin;
use App\Models\news;
use App\Models\Genre;
use App\Models\Series;
use App\Models\episode;
use App\Models\seriesHasEpisode;
use App\Models\SeriesHasGenres;
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


        // SERIES
        $series1 = series::create([
            'cover' => 'https://miro.medium.com/max/2560/1*7e8qoT5T26S5PTf568frrg.jpeg',
            'trailer' => 'https://www.youtube.com/embed/LV-nazLVmgo',
            'title' => 'Season 1',
            'article' => 'The first season of the Attack on Titan anime television series was produced by IG Port Wit Studio and directed by Tetsurō Araki, with Yasuko Kobayashi handling series composition and Kyōji Asano providing character designs. It covers the first story arcs (chapters 1–34) from the original manga by Hajime Isayama. Attack on Titan is set in a world where humanity lives inside cities surrounded by enormous walls due to the Titans, gigantic humanoid beings who devour humans. The story follows the adventures of Eren Jaeger and his childhood friends Mikasa Ackerman and Armin Arlert, whose lives are changed forever after a Colossal Titan breaches the wall of their home town. Vowing revenge and to reclaim the world from the Titans, Eren and his friends join the Scout Regiment, an elite group of soldiers who fight Titans.

            The season was broadcast on MBS TV from April 7 to September 29, 2013 and later aired on Tokyo MX, FBS, TOS, HTB, TV Aichi and BS11. Both Funimation and Crunchyroll have streamed the series with subtitles on their respective websites. Funimation has also licensed the anime for home video release in 2014. Episode 1 of Funimation English dubbed version premiered at Anime Boston, with other episodes put on Funimations subscription services. In the United States, the dub of the series was broadcast weekly on Adult Swims Toonami programming block starting on May 3, 2014 at 11:30 p.m. EDT.

            The score is composed by Hiroyuki Sawano. The opening theme song for the seasons first 13 episodes is "Feuerroter Pfeil und Bogen" (紅蓮の弓矢, Guren no Yumiya, lit. "Crimson Bow and Arrow") by Linked Horizon, and the ending theme is "Utsukushiki Zankoku na Sekai" (美しき残酷な世界, lit. "A Beautiful Cruel World") by Yōko Hikasa. For the rest of the season, the opening theme is "Die Flügel der Freiheit" (自由の翼, Jiyū no Tsubasa, lit. "The Wings of Freedom") also by Linked Horizon and the ending theme is "Great Escape" by Cinema Staff. The opening themes were collected on Linked Horizons single "Jiyū e no Shingeki" which sold over 100,000 copies in its first week of sales
            ',
            'countryOfOrigin' => 'Japan',
            'originalRelease' => Carbon::parse('2013-04-29'),
        ]);

        $series2 = series::create([
            'cover' => 'https://i1.sndcdn.com/artworks-000215769195-uj8z0s-t500x500.jpg',
            'trailer' => 'https://www.youtube.com/embed/hAzoApdhXrw',
            'title' => 'Season 2',
            'article' => 'The second season of the Attack on Titan anime television series was produced by IG Ports Wit Studio, chief directed by Tetsurō Araki and directed by Masashi Koizuka, with Yasuko Kobayashi handling series composition and Kyōji Asano providing character designs. It covers the "Clash of the Titans" arc (chapters 35–50) from the original manga by Hajime Isayama. It was broadcast on MBS TV from April 1 to June 17, 2017,[1] and later aired on Tokyo MX, FBS, TOS, HTB, TV Aichi and BS11.[2] Funimation and Crunchyroll streamed the second season on their respective websites, while Adult Swim aired Funimations English dubbed version.[3]

            The season follows Eren Jaeger and his friends from the 104th Training Corps who have just begun to become full members of the Survey Corps. After fighting the Female Titan, Eren finds no time to rest as a horde of Titans is approaching Wall Rose and the battle for humanity continues. As the Survey Corps races to save the wall, they uncover more about the invading Titans and the dark secrets of their own members.
            
            The score is composed by Hiroyuki Sawano. The opening theme song is "Opfert eure Herzen!" (心臓を捧げよ！, Shinzō o Sasageyo!, lit. "Dedicate Your Hearts!") by Linked Horizon, and the ending theme song is "Yūgure no Tori" (夕暮れの鳥, lit. "Birds of Twilight") by Shinsei Kamattechan.
            ',
            'countryOfOrigin' => 'Japan',
            'originalRelease' => Carbon::parse('2017-06-17'),
        ]);

        $series3 = series::create([
            'cover' => 'https://cdn.myanimelist.net/images/anime/1173/92110.jpg',
            'trailer' => 'https://www.youtube.com/embed/HOLGK3kRBj4',
            'title' => 'Season 3',
            'article' => 'The third season of the Attack on Titan anime television series was produced by IG Ports Wit Studio, chief directed by Tetsurō Araki and directed by Masashi Koizuka, with Yasuko Kobayashi handling series composition and Kyōji Asano providing character designs. It covers the "Uprising" (chapters 51–70) and "Return to Shiganshina" (chapters 71–90) arcs from the original manga by Hajime Isayama. The seasons first 12 episodes were broadcast on NHK General TV from July 23 to October 15, 2018, before going into hiatus until April 29, 2019. Adult Swim began airing Funimations English dub on August 18, 2018.

            The season follows Eren and his fellow soldiers from the Survey Corps who are still fighting for their survival against the terrifying Titans. However, threats arise not only from the Titans beyond the walls, but from the humans within them as well. After being rescued from the Colossal and Armored Titans, all seems well for the soldiers, until the government suddenly demands custody of Eren and Historia. Sought after by the government, Levi and his new squad must evade their adversaries in hopes of keeping Eren and Historia safe. In the second half of the season, the Survey Corps led by Erwin embark on a mission to retake Wall Maria, returning to the tattered Shiganshina District that was once Erens home. The Survey Corps strive to carve a path towards victory as Eren vows to take back everything that was once his.
            
            The score is composed by Hiroyuki Sawano. The opening theme for the seasons first 12 episodes is "Red Swan" by Yoshiki featuring Hyde, and the ending theme is "Akatsuki no Requiem" (暁の鎮魂歌, Akatsuki no Chinkonka, lit. "Daybreak Requiem") by Linked Horizon. The opening theme for the second part of third season is "Shoukei to Shikabane no Michi" (憧憬と屍の道, lit. "The Path of Longing and Corpses") performed by Linked Horizon and the second ending theme is "Name of Love" performed by Cinema Staff.
            ',
            'countryOfOrigin' => 'Japan',
            'originalRelease' => Carbon::parse('2019-07-01'),

        ]);

        $series4 = series::create([
            'cover' => 'https://foto.kontan.co.id/vfg5YWYH_jnPVtMMi-hnX9QO3G8=/smart/2020/12/28/95694032p.jpg',
            'trailer' => 'https://www.youtube.com/embed/ZefrVAetxVI',
            'title' => 'Season 4',
            'article' => 'The fourth and final season of the Attack on Titan anime television series, subtitled Attack on Titan: The Final Season, was produced by MAPPA, chief directed by Jun Shishido, and directed by Yuichiro Hayashi, replacing Tetsurō Araki and Masashi Koizuka, respectively. Scriptwriter Hiroshi Seko fully took over the series composition from Yasuko Kobayashi, and Tomohiro Kishi replaced Kyōji Asano as character designer due to the series switching production studios. The season covers the Marley (chapters 91–106) and War for Paradis (chapters 107–139) arcs from the original manga by Hajime Isayama.

            The season introduces Gabi Braun and Falco Grice, young Eldian Warrior candidates seeking to inherit Reiners Armored Titan four years after the failed mission to reclaim the Founding Titan. While Marley plans to invade Paradis to strengthen their weakening military and retrieve the Founding Titan, the Survey Corps lay an attack in their homeland.As Marley and the Paradis forces go to war in Marley and the Shiganshina District, both sides sustain a heavy death toll while Gabi and Falco are forced to confront their internal tensions about the supposed "devils" of Paradis. In the second part of the season, aware of the global anti-Eldian sentiment resulting from Marleyan propaganda, Eren Jaeger preemptively targets the world outside of Paradis with the Rumbling, unleashing millions of Colossal-like Wall Titans in a widespread effort to kill all life beyond the island.
            
            The first part of the season aired on NHK General TV from December 7, 2020, to March 29, 2021, at 12:10 a.m. JST. In the United States, Adult Swims Toonami programming block began airing Funimations English dub on January 10, 2021, at 12:30 a.m. EST/PST. In Southeast Asia, the subbed series was released on iQiyi. A second part aired on NHK General TV from January 10 to April 4, 2022, at 12:05 a.m. JST. A third and final part will premiere in 2023.
            ',
            'countryOfOrigin' => 'Japan',
            'originalRelease' => Carbon::parse('2020-12-07'),

        ]);

        // GENRE SERIES
        $series1HasGenres = [11, 1];
        $series2HasGenres = [11];
        $series3HasGenres = [11];
        $series4HasGenres = [11];

        foreach ($series1HasGenres as $genre) {
            SeriesHasGenres::create([
                'series_id' => $series1->id,
                'genre_id' => $genre
            ]);
        }

        foreach ($series2HasGenres as $genre2) {
            SeriesHasGenres::create([
                'series_id' => $series2->id,
                'genre_id' => $genre2
            ]);
        }

        foreach ($series3HasGenres as $genre3) {
            SeriesHasGenres::create([
                'series_id' => $series3->id,
                'genre_id' => $genre3
            ]);
        }

        foreach ($series4HasGenres as $genre4) {
            SeriesHasGenres::create([
                'series_id' => $series4->id,
                'genre_id' => $genre4
            ]);
        }
        // ANIME SEEDER
        anime::create([
            'cover' => 'https://cdn-2.tstatic.net/style/foto/bank/images/kimi-no-nawa_20170118_142451.jpg',
            'title' => 'Kimi no Na Wa',
            'article' =>
            'Your Name (Japanese: 君の名は。, Hepburn: Kimi no Na wa) is a 2016 Japanese animated romantic fantasy film produced by CoMix Wave Films and distributed by Toho. It depicts a high school boy in Tokyo and a high school girl in the Japanese countryside who suddenly and inexplicably begin to swap bodies.

            The film was commissioned in 2014, written and directed by Makoto Shinkai. It features the voices of Ryunosuke Kamiki and Mone Kamishiraishi, with animation direction by Masashi Ando, character design by Masayoshi Tanaka, and its orchestral score and soundtrack composed by Radwimps. A light novel of the same name, also written by Shinkai, was published a month prior to the films premiere.
            
            Your Name premiered at the 2016 Anime Expo in Los Angeles on July 3, 2016, and was theatrically released in Japan on August 26, 2016, and in the United States on April 7, 2017. The film was critically acclaimed, with praise for the animation, music, visuals, and emotional weight. The film grossed over ¥41.44 billion (US$377.59 million) worldwide, breaking numerous box office records, including becoming the third highest-grossing anime film of all time, unadjusted for inflation.
            
            The film won Best Animated Feature at the 2016 Los Angeles Film Critics Association Awards, 49th Sitges Film Festival, and as the 71st Mainichi Film Awards, and nominated for Best Animation of the Year at the 40th Japan Academy Prize. As of 2021, a live-action American remake by Paramount Pictures is in development.',
            'plot' =>
            'In 2013, Mitsuha Miyamizu is a high school girl living in the rural town of Itomori, Japan. Bored of the town, she wishes to be a Tokyo boy in her next life. One day, she inexplicably begins to switch bodies intermittently with Taki Tachibana, a high school boy in Tokyo. Thus, when they wake up as each other on some mornings, they must live through the others respective activities and social interactions for the day. They learn they can communicate with each other by leaving messages on paper, phones, and sometimes on each others skin. Mitsuha (in Takis body) sets Taki up on a date with coworker Miki Okudera, while Taki (in Mitsuhas body) causes Mitsuha to become popular at school. One day, Taki (in Mitsuhas body) accompanies Mitsuhas grandmother Hitoha and younger sister Yotsuha to leave the ritual alcohol kuchikamizake, made by the sisters, as an offering at the Shinto shrine located on a mountaintop outside the town. It is believed to represent the body of the village guardian god ruling over human connections and time. Taki reads a note from Mitsuha about the comet Tiamat, expected to pass nearest to Earth on the day of the autumn festival. The next day, Taki wakes up in his body and goes on a date with Miki, who tells him she enjoyed the date but also that she can tell he is preoccupied with thoughts of someone else. Taki attempts to call Mitsuha on the phone but cannot reach her as the body-switching ends.

            Taki, Miki, and their friend Tsukasa travel to Gifu by train on a trip to Hida in search of Mitsuha. However, Taki does not know the name of Itomori, relying on his sketches of the surrounding landscape from memory. A restaurant owner in Takayama recognizes the town in the sketch, being from there. He takes Taki and his friends to the ruins of Itomori, which has been destroyed and where 500 residents were killed when Tiamat unexpectedly fragmented as it passed by Earth three years earlier. Taki observes Mitsuhas messages disappear from his phone, and his memories of her begin to gradually fade, realizing the two were also separated by time, as he is in 2016. Taki finds Mitsuhas name in the record of fatalities. While Miki and Tsukasa return to Tokyo, Taki journeys to the shrine, hoping to reconnect with Mitsuha and warn her about Tiamat. There, Taki drinks Mitsuhas kuchikamizake and then lapses into a vision, where he glimpses Mitsuhas past. He also recalls that he encountered Mitsuha on a train when she came to Tokyo the day before the event to find him, though Taki did not recognize her as the body-switching was yet to occur in his timeframe. Before leaving the train in embarrassment, Mitsuha had handed him her hair ribbon, which he has since worn on his wrist as a good-luck charm.
            
            Taki wakes up in Mitsuhas body at her house on the morning of the festival. Hitoha deduces what has happened and tells him the body-switching ability has been passed down in her family as caretakers of the shrine. Taki convinces Tessie and Sayaka, two of Mitsuhas friends, to get the townspeople to evacuate Itomori by disabling the electrical substation and broadcasting a false emergency alert. Taki heads to the shrine, realizing that Mitsuha must be in his body there, while Mitsuha wakes up in Takis body. At sunset, the two sense each others presence on the mountaintop but are separated due to contrasting timeframes and cannot see each other. When twilight falls,[note 1] they return to their own bodies and see each other in person. After Taki returns Mitsuhas ribbon, they attempt to write their names on each others palms so that they will remember each other. However, before Mitsuha can write hers, twilight passes, and they revert to their respective timeframes. When the evacuation plan fails, Mitsuha has to convince her father, Toshiki, the mayor of Itomori, to evacuate everyone. Before doing so, Mitsuha notices her memories of Taki are fading away and discovers he wrote "I love you" on her hand instead of his own name. After Tiamat crashes, Taki returns to his own timeframe and remembers nothing.
            
            Five years later, Taki, having graduated from university, is searching for a job. He senses he has lost something vital that he cannot identify, and feels inexplicable interest in the events surrounding Tiamat, now eight years in the past: Itomori was destroyed, but all of its people survived as they had evacuated just in time. Mitsuha has since moved to Tokyo. Sometime later, Taki and Mitsuha glimpse each other when their respective trains pass each other and are instantly drawn to seek one another, disembarking and racing to find the other, finally meeting at the stairs of Suga Shrine. Taki calls out to Mitsuha, saying that he feels he knows her, and she responds likewise. Having finally found what each had long searched for, they shed tears of happiness and simultaneously ask each other for their name.',
            'production' =>
            'The idea for this story came to Shinkai after he visited Yuriage, Natori, Miyagi Prefecture in July 2011, after the Great East Japan Earthquake occurred. He said, "This could have been my town." He said that he wanted to make a movie in which the positions of the people in Yuriage would be swapped with the viewers. The sketches that Shinkai drew during this visit have been shown in exhibitions.

            In Makoto Shinkais proposal sent to Toho on September 14, 2014, the film was originally titled Yume to Shiriseba (夢と知りせば, If I Knew It Was a Dream), derived from a passage in a waka, or "Japanese poem", attributed to Ono no Komachi. Its title was later changed to Kimi no Musubime (きみの結びめ, Your Connection) and Kimi wa Kono Sekai no Hanbun (きみはこの世界のはんぶん, You Are Half of This World) before becoming Kimi no Na Wa. On December 31, 2014, Shinkai announced that he had been spending his days writing storyboard for this film.
            
            While the town of Itomori, one of the film\'s settings, is fictional, the film drew inspirations from real-life locations that provided a backdrop for the town. Such locations include the city of Hida in Gifu Prefecture and its library, Hida City Library.['
        ]);

        // EPISODE SEEDER
        $episode1 = episode::create([
            'titleCard' => 'https://i1.sndcdn.com/artworks-000215769195-uj8z0s-t500x500.jpg',
            'noInSeason' => '1',
            'title' => 'To You, in 2000 Years: The Fall of Shiganshina, Part 1',
            'directedBy' => 'Hiroyuki Tanaka, Tetsurō Araki',
            'writenBy' => 'Yasuko Kobayashi',
            'description' => 'For over a century, humans have been living in settlements surrounded by three 50m gigantic walls, Wall Maria, Wall Rose and Wall Sina, which prevent the Titans, giant humanoid creatures who eat humans, from entering. Eren Jaeger, of the town called the Shiganshina District, wishes to see the outside world by joining the Scout Regiment, as he likens living in the cities to livestock. Despite this, his friend Mikasa Ackermann and their mother Carla Jaeger are against him joining the Scouts. Even after seeing the Scouts return home with large casualties, Eren expresses his interest to join, which impresses his father Grisha Jaeger, who promises to show him what lies in their basement once he returns. After Eren and Mikasa rescue their friend Armin Arlert from a group of delinquents, the Colossal Titan, a 60m Titan, suddenly appears and knocks down the gate to the Shiganshina District, which lies in the outer edge of Wall Maria, allowing smaller Titans to enter. As the town erupts into mass panic, Eren and Mikasa rush back to their house, only to see Carla pinned under their collapsed house. As a Smiling Titan approaches them, Carla begs them to flee, but they refuse until city guard Hannes arrives and assures them that he will defend them. However, as he charges towards the Titan, he is overcome with fear and takes Eren and Mikasa away. Eren watches in horror as a Smiling Titan eats Carla',
            'originalAirDate' => Carbon::parse('2013-11-07'),

        ]);

        seriesHasEpisode::create([
            'series_id' => $series1->id,
            'episode_id' => $episode1->id
        ]);
    }
}
