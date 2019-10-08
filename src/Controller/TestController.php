<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\UseCase\Cache;
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
     * @return Response
     * 
    Во втором action’е необходимо реализовать получение случайной сущности из базы, сущность описать используя doctrine, TestEntity (id, title, weight). Нужно ориентироваться на большое количество элементов в искомой таблице

    Примечания:
    Можно использовать докер для этого приложения.
    Юнит-тесты приветствуются.
    Итоговый результат залить в git.

     */
    public function random(): Response
    {
        return $this->json([
                    'name' => 'JSON API',
        ]);
    }
}