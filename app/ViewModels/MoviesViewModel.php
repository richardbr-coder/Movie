<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPopularMovies;
    public $genres;
    
    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    public function popularMovies(){
        return $this->formatmovies($this->popularMovies);
    }
    public function nowPlayingMovies(){
        return $this->formatmovies($this->nowPlayingMovies);
    }

    public function genres(){
        return collect($this->genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatmovies($movies){

        return collect($this->nowPlayingMovies)->map(function($movie){
            
            $genresFormatted = collect($movie['genre_ids'])->mapwithkeys(function($value){
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'], 
                'vote_average' => $movie['vote_average']* 10 . '%', 
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ]);
        });
    }

}
