<?php

namespace App\Controller;

use App\Services\MoviesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(MoviesService $moviesService)
    {
        $popular = $moviesService->getPopularMovies();
        $rated = $moviesService->getRatedMovies();

        return $this->render('default/index.html.twig', [
            'popular' => $popular,
            'rated' => $rated
        ]);
    }

    /**
     * @Route("/{id}", name="detail")
     */
    public function detail($id, MoviesService $moviesService)
    {
        $movie = $moviesService->getDetaileMovie($id);

        return $this->render('default/detail.html.twig', [
            'movie' => $movie
        ]);

    }
}
