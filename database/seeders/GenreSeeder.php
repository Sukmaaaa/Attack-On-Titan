<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Comedy',
            'Sci-Fi',
            'Horror',
            'Thriller',
            'Magic',
            'Supernatural',
            'Sports',
            'Adventure',
            'Slice of life',
            'post Apocalyptic',
            'Fantasy',
            'Action',
            'Romance'
        ];

        $hehe = [
            // comedy
            'Uplifting the audience with positive emotion takes priority, eliciting laughter, amusement, or general entertainment. Almost always, comedy stories are episodic or have happy endings.

            Nearly every work will use comedy as a plot device to relieve tension, but the overarching narrative must be focused on evoking amusement to be Comedy. Drama and Comedy are not mutually exclusive, but mixing them requires the audience facing human struggle with lightheartedness. Slice of Life and Comedy are incompatible by definition.',
            'Imagined technological advancements or natural settings which are currently unreal in the present day but could be invented, caused, or explained by science in the future. The narrative of science fiction (Sci-Fi or SF) stories focuses on the societal or individual reprecussions caused by the imagined technology or natural phenomenon, and are frequently dystopian in nature.
 
            Sufficient world-building is required for a work to be Sci-Fi; an alien simply visiting from outer space and living on Earth with unusual powers would be Supernatural. Characters in Sci-Fi stories can have unnatural powers without a Fantasy/Supernatural tag, but there should be a plausible scientific reason for these powers described by the creator. A futuristic setting with impossible, unexplained powers (e.g. humans randomly evolved to control the weather via thought) would be Fantasy.',
            // Sci-Fi
            'Creating—and maintaining—a sense of dread in the audience takes priority, eliciting shock, fear, or disgust through atmosphere and frightening scenarios. Mood must be of equal or greater importance than setting and characterization in horror stories. Almost always, the main cast will be under constant threat of danger.

            Many stories can incorporate elements of horror as a plot device to unnerve the audience, but the overarching narrative must be focused on evoking and maintaining apprehension to be Horror. Contrast with Suspense where the audience craves to know what will happen next rather than fearing it.',
            // Horror
            'The thriller genre can perhaps be characterized by its most defining trait: suspense. A good thriller should keep you fearful and/or excited for what is going to happen next, and desperately waiting for everything to resolve itself.',
            'Magic-wielding anime characters come in all shapes and sizes. Characters who wield this power can range from being able to bend reality to their will, to having to follow a very strict set of rules in order to not blow themselves up.

            This list will only take each series into consideration once. If a show, movie, or OVA has a sequel, alternate adaptation, or something similar, our list will only take the earliest point in the series (i.e. the starting point) into consideration.',
            // Thriller
            'Primarily taking place on Earth, supernatural stories incorporate elements or attributes that are unnatural and unexplainable by science. Creatures common in folklore (ghosts, vampires) or humans with metaphysical powers (telekinesis, mind reading) are often featured.

            Character traits (e.g. demon/spirit) and setting alone do not determine if a story is Supernatural. If only a few characters have powers and most of the cast would be in disbelief to discover this (e.g. one man is an exorcist and the rest are normal adults), then the story is Supernatural. If majority of the cast has magical or supernatural powers (e.g. one normal highschool boy surrounded by five goddesses), then the story is Fantasy. Sometimes a story can be both Supernatural and Fantasy, but this is rare.',
            // Supernatural
            'Primarily taking place on Earth, supernatural stories incorporate elements or attributes that are unnatural and unexplainable by science. Creatures common in folklore (ghosts, vampires) or humans with metaphysical powers (telekinesis, mind reading) are often featured.

            Character traits (e.g. demon/spirit) and setting alone do not determine if a story is Supernatural. If only a few characters have powers and most of the cast would be in disbelief to discover this (e.g. one man is an exorcist and the rest are normal adults), then the story is Supernatural. If majority of the cast has magical or supernatural powers (e.g. one normal highschool boy surrounded by five goddesses), then the story is Fantasy. Sometimes a story can be both Supernatural and Fantasy, but this is rare.',
            // Sports
            'Training for and participating in a sport take priority, with the goal of furthering ones athletic abilities—either to win a competition or achieve some social standing. While the featured sport may be individual or team, the main cast will always overcome conflict through discussion and insights gained from other athletes or coaches. This creates a general sense of collective support and achievement that is always present in Sports stories.',
            // Adventure
            'Whether aiming for a specific goal or just struggling to survive, the main character is thrust into unfamiliar situations or lands and continuously faces unexpected dangers. The narrative of adventure stories is always on how the characters react to sudden events or trials during the journey, indicating personal growth or setback based on which actions or choices are taken.',
            // Slice of life
            'Slice of Life stories are focused on a seemingly random and mundane period of the main characters lives. The absence of a central plot to carry the story towards a charted destination means Slice of Life stories frequently lack overarching conflict and resolution. While life is not without conflict and Slice of Life neither, here conflict appears and dissipates seemingly at will, without a specific narrative to enforce it.

            Slow story pacing or episodic storytelling does not equal Slice of Life. Drama/Romance stories can be slow and soft while maintaining a central plot of human/relationship struggle. Comedy stories may lack progress and have mundane settings, but they have narratives focused on eliciting laughter rather than amusing moments happening naturally. Thus, Slice of Life is incompatible with Comedy, Drama, and Romance by definition.',
            // Post Apocalyptic
            'Apocalyptic and post-apocalyptic fiction is a subgenre of science fiction, science fantasy, dystopia or horror in which the Earths (or another planets) civilization is collapsing or has collapsed. The apocalypse event may be climatic, such as runaway climate change; astronomical, such as an impact event; destructive, such as nuclear holocaust or resource depletion; medical, such as a pandemic, whether natural or human-caused; end time, such as the Last Judgment, Second Coming or Ragnarök; or more imaginative, such as a zombie apocalypse, cybernetic revolt, technological singularity, dysgenics or alien invasion.',
            // Fantasy
            'Magical powers, unnatural creatures, or other unreal elements which cannot be explained by science are prevalent and normal to the setting they exist in. Fantasy stories can take place on Earth (urban fantasy) or in another world.

            Character traits (e.g. magician vs demon/spirit) and setting do not determine if a story is Fantasy. If majority of the cast has magical or supernatural powers (e.g. one normal highschool boy surrounded by five goddesses), then the story is Fantasy. If only a few characters have powers and most of the cast would be in disbelief to discover this (e.g. one man is an exorcist and the rest are normal adults), then the story is Supernatural. Sometimes a story can be both Fantasy and Supernatural, but this is rare.',
            // Action
            'Exciting action sequences take priority and significant conflicts between characters are usually resolved with ones physical power. While the overarching plot may involve one group against another, the narrative in action stories is always focused on the strengths/weaknesses of individual characters and the effort they put into their personal battles with the opposing groups members.

            Contrast with Military or Sports where the narrative is on collective achievement, or monster-of-the-week where the brief action scenes are a predicted climax to the episodes plot.',
            // Romance
            'Falling in love and struggling to progress towards—or maintain—a romantic relationship take priority, while other subplots either take backseat or are designed to develop the main love story. The narrative focuses on the thoughts and emotions of the characters, illustrating the connections between them and explaining their reactions to events or conflict. Almost always, the story ends happily and the couple is rewarded for their efforts with lasting love.

            Romance stories require significant romantic development leading to some kind of conclusion: either to begin the relationship, continue it, or end it. Open-ended romantic endings are only acceptable when the work is an incomplete adaptation of a Romance source. "Teasing" stories which do not narrate significant romantic development but have a conclusion should be tagged Romantic Subplot.
            
            A story can be simply Romance. Since they are plot-driven stories showing humans experiencing romantic struggle, most Romance has some Drama inherently. For both tags, the drama should be focused not only on the relationship but also on the side storylines; for example, one character overcoming the death of a loved one or a drug addiction. Comedy requires Romance narratives to be focused on eliciting laughter, not only using comedy for lightheartedness. Slice of Life and Romance are incompatible by definition.'
        ];

        foreach ($genres as $key => $value) {
            Genre::create(['name' => $value, 'definition' => $hehe[$key]]);
        }
    }
}
