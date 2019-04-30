<?php

namespace App\Services;

use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Model\Movie;
use Tmdb\Repository\MovieRepository;

class MoviesService
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $token = new ApiToken(getenv('TMDB_API_KEY'));
        $this->client = new Client($token);

    }

    /**
     * @return Movie[]
     */
    public function getPopularMovies()
    {
        $repository = new MovieRepository($this->client);
        $popular = $repository->getPopular();

        return $popular;
    }

    /**
     * @return Movie[]
     */
    public function getRatedMovies()
    {
        $repository = new MovieRepository($this->client);
        $rated = $repository->getTopRated();

        return $rated;
    }

    /**
     * @return Movie
     */
    public function getDetaileMovie($id)
    {
        $movie = $this->client->getMoviesApi()->getMovie($id);

        return $movie;
    }
}