<?php

namespace App\DataFixtures;

use App\Entity\Test;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 1100; $i++) {
            $manager->persist($this->createTestByWeight($i));
        }
        $manager->flush();
    }

    private function createTestByWeight(int $weight): Test
    {
        return Test::create('Title сущность ' . $weight, $weight);
    }
}