<?php

namespace App\Repository;

use App\Entity\Test;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Test|null find($id, $lockMode = null, $lockVersion = null)
 * @method Test|null findOneBy(array $criteria, array $orderBy = null)
 * @method Test[]    findAll()
 * @method Test[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Test::class);
    }

    public function get(int $id): Test
    {
        if (!$test = $this->find($id)) {
            throw new EntityNotFoundException('Test is not found.');
        }
        return $test;
    }

    /**
     * @return Test[] Returns an array of Test objects
     */
    public function getRandomEntity()
    {
        $ids = array_map(function($item) {
            return $item['id'];
        },
                $this->createQueryBuilder('t')
                        ->select('t.id')
                        ->orderBy('t.id', 'DESC')
                        ->getQuery()
                        ->getResult()
        );
        $id = $ids[array_rand($ids)];
        return $this->get($id);
    }
}