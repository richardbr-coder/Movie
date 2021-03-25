<?php

namespace App\ViewModels;

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
        return $this->popularMovies;
    }
    public function nowPlayingMovies(){
        return $this->nowPlayingMovies;
    }
    public function genres(){
        return $this->genres;
    }
}
