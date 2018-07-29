<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Market
 *
 * @ORM\Table(name="market")
 * @ORM\Entity
 */
class Market
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMarket", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmarket;

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



    /**
     * Get idmarket
     *
     * @return integer
     */
    public function getIdmarket()
    {
        return $this->idmarket;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Market
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param float $lon
     *
     * @return Market
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon
     *
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }
}
