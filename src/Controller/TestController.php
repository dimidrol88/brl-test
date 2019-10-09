<?php

declare(strict_types=1);

namespace App\Controller;

use App\UseCase\Cache;
use App\UseCase\Random;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    /**
     * @Route("/", name="index", methods={"GET"})
     * @param Cache $cache
     * @return Response
     */
    public function index(Cache $cache): Response
    {
        return $this->json($cache->getData(Cache::MODIFY_INTERVAL));
    }

    /**
     * @Route("/random", name="random", methods={"GET"})
     * @param Random $random 
     * @return Response
     */
    public function random(Random $random): Response
    {
        return $this->json($random->getData());
    }
}