<?php

use App\Entities\Comment;
use App\Entities\Film;
use App\Entities\Genre;
use Illuminate\Database\Seeder;

class DataForFilmsAndComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newGenres = [
            'Action',
            'Adventure',
            'Crime',
            'Comedy'
        ];

        foreach ($newGenres as $newGenre) {
            $genre = new Genre();
            $genre->name = $newGenre;
            $genre->save();
        }



        $newFilms =
            [
                [
                    'name' => 'Ant Man and The Wasp',
                    'slug_name' => 'ant-man-and-the-wasp',
                    'description' => 'As he struggles to re-balance his home life with his responsibilities as Ant-Man (Paul Rudd), he’s confronted by Hope van Dyne and Dr. Hank Pym with an urgent new mission. Scott must once again put on the suit and learn to fight alongside The Wasp as the team works together to uncover secrets from their past.',
                    'release_date' => '2018-07-06',
                    'rating' => 3,
                    'ticket_price'=> 25,
                    'country'=>'American',
                    'photo'=>'http://static.wildaboutmovies.com/wp-content/uploads/Ant-Man-and-the-Wasp-movie-poster-200x300.jpg',
                ],[
                    'name' => 'The First Purge',
                    'slug_name' => 'the-first-purge',
                    'description' => 'To push the crime rate below one percent for the rest of the year, the New Founding Fathers of America (NFFA) test a sociological theory that vents aggression for one night in one isolated community. But when the violence of oppressors meets the rage of the marginalized, the contagion will explode from the trial-city borders and spread across the nation.',
                    'release_date' => '2018-07-04',
                    'rating' => 4,
                    'ticket_price'=> 21,
                    'country'=>'American',
                    'photo'=>'http://static.wildaboutmovies.com/wp-content/uploads/first_purge_ver3-200x300.jpg',
                ],[
                    'name' => 'Whitney',
                    'slug_name' => 'whitney',
                    'description' => 'Whitney Houston broke more music industry records than any other female singer in history. With over 200 million album sales worldwide, she was the only artist to chart seven consecutive U.S. No. 1 singles. She also starred in several blockbuster movies before her brilliant career gave way to erratic behavior, scandals and death at age 48.',
                    'release_date' => '2018-07-06',
                    'rating' => 4,
                    'ticket_price'=> 19,
                    'country'=>'American',
                    'photo'=>'http://static.wildaboutmovies.com/wp-content/uploads/whitney_ver2-200x300.jpg',
                ]
            ];

        $comments = [
            [
                'name' => 'Le',
                'comments' => ' Good film!!!'
            ],
            [
                'name' => 'Nguyen',
                'comments' => 'fearful!!!'
            ],
            [
                'name' => 'Trang',
                'comments' => 'Show your life!'
            ]
        ];

        foreach ($newFilms as $key =>  $newFilm) {
            //Create new Film
            $film = new Film();
            $film->fill($newFilm)->save();

            //Create new Comment with Film has just created before
            $comment = new Comment();
            $comments[$key]['film_id'] = $film->id;
            $comment->fill($comments[$key])->save();
        }

    }
}
