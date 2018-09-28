<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Market
 *
 * @ORM\Table(name="market")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MarketRepository")
 */
class Market
{
    /**
     * @var string
     *
     * @ORM\Column(name="UUID", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uuid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=false)
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lon", type="float", precision=10, scale=0, nullable=false)
     */
    private $lon;

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat(float $lat)
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function setLon(float $lon)
    {
        $this->lon = $lon;

        return $this;
    }


}
