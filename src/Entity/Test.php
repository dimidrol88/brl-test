<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 * @ORM\Table(name="tests", indexes={
 *     @ORM\Index(columns={"weight"})
 * })
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=256)
     * @Assert\Length(max=256)
     * @Assert\NotBlank
     */
    private $title;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $weight;

    public static function create(string $title, int $weight): self
    {
        $test = new self();
        $test->setTitle($title);
        $test->setWeight($weight);
        return $test;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }
}