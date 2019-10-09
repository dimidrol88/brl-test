<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Entity\Test;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class RandomTest extends TestCase
{

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
    }

    public function testCreate(): void
    {
        $title = 'Title';
        $weight = 1;
        $test = Test::create($title, $weight);

        self::assertEquals($test->getTitle(), $title);
        self::assertEquals($test->getWeight(), $weight);
    }
}