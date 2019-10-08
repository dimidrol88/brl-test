<?php

namespace App\UseCase;

use DateTimeImmutable;
use ErrorException;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\CacheItem;

class Cache
{
    public const MODIFY_INTERVAL = '+60 sec';
    public const CACHE_KEY = 'brl_cache_item';

    private $cache;

    public function __construct(AdapterInterface $cache)
    {
        $this->cache = $cache;
    }

    public function getData(string $modify)
    {
        if ($this->cache->hasItem(self::CACHE_KEY)) {
            $item = $this->cache->getItem(self::CACHE_KEY);
        } else {
            $item = $this->setCacheData($modify);
        }
        return [
            'data' => $item->get()
        ];
    }

    public function setCacheData(string $modify): CacheItem
    {
        $item = $this->cache->getItem(self::CACHE_KEY);
        $item->set($this->data());
        $item->expiresAt($this->getDatetimeModify($modify));
        $this->cache->save($item);
        return $item;
    }

    private function getDatetimeModify(string $modify): \DateTimeImmutable
    {
        $date = new DateTimeImmutable();
        try {
            return $date->modify($modify);
        } catch (ErrorException $ex) {
            return $date->modify(self::MODIFY_INTERVAL);
        }
    }

    private function data(): array
    {
        $date = new DateTimeImmutable();
        return [
            'id' => 1,
            'title' => 'test',
            'author' => [
                'id' => 1,
                'username' => 'test username'
            ],
            'created_at' => $date->getTimestamp()
        ];
    }
}