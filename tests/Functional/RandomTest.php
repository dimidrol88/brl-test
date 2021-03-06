<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RandomTest extends WebTestCase
{
    private const URI = '/random';

    /**
     * @var KernelBrowser
     */
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->client->disableReboot();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testGet(): void
    {
        $this->client->request('GET', self::URI);

        self::assertEquals(200, $this->client->getResponse()->getStatusCode());
        self::assertJson($content = $this->client->getResponse()->getContent());

        $data = json_decode($content, true);

        self::assertArrayHasKey('data', $data);
    }

    public function testMethodPost(): void
    {
        $this->client->request('Post', self::URI);

        self::assertEquals(405, $this->client->getResponse()->getStatusCode());
    }
}