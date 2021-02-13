<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExampleRepository")
 */
class Example
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private int $temp;

    /**
     * @ORM\Column(type="integer")
     */
    private int $humility;

    /**
     * @ORM\Column(type="integer")
     */
    private int $rainfall;

    /**
     * @ORM\Column(type="string", length=2)
     *
     */
    private string $windDirection;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemp(): ?int
    {
        return $this->temp;
    }

    public function setTemp(string $temp): self
    {
        $this->temp = $temp;

        return $this;
    }
    public function getHumility(): ?int
    {
        return $this->humility;
    }

    public function setHumility(int $humility): self
    {
        $this->humility = $humility;

        return $this;
    }
    public function getRainfall(): ?int
    {
        return $this->rainfall;
    }

    public function setRainfall(string $rainfall): self
    {
        $this->rainfall = $rainfall;

        return $this;
    }
    public function getWindDirection(): ?string
    {
        return $this->windDirection;
    }

    public function setWindDirection(string $windDirection): self
    {
        $this->windDirection = $windDirection;

        return $this;
    }
}
