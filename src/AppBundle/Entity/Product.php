<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProduct", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduct;

    /**
     * @var string
     *
     * @ORM\Column(name="productName", type="string", length=100, nullable=false)
     */
    private $productname;

    /**
     * @var boolean
     *
     * @ORM\Column(name="purchased", type="boolean", nullable=true)
     */
    private $purchased;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=500, nullable=false)
     */
    private $path;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="productproduct")
     */
    private $useruser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->useruser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idproduct
     *
     * @return integer
     */
    public function getIdproduct()
    {
        return $this->idproduct;
    }

    /**
     * Set productname
     *
     * @param string $productname
     *
     * @return Product
     */
    public function setProductname($productname)
    {
        $this->productname = $productname;

        return $this;
    }

    /**
     * Get productname
     *
     * @return string
     */
    public function getProductname()
    {
        return $this->productname;
    }

    /**
     * Set purchased
     *
     * @param boolean $purchased
     *
     * @return Product
     */
    public function setPurchased($purchased)
    {
        $this->purchased = $purchased;

        return $this;
    }

    /**
     * Get purchased
     *
     * @return boolean
     */
    public function getPurchased()
    {
        return $this->purchased;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Product
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Add useruser
     *
     * @param \AppBundle\Entity\User $useruser
     *
     * @return Product
     */
    public function addUseruser(\AppBundle\Entity\User $useruser)
    {
        $this->useruser[] = $useruser;

        return $this;
    }

    /**
     * Remove useruser
     *
     * @param \AppBundle\Entity\User $useruser
     */
    public function removeUseruser(\AppBundle\Entity\User $useruser)
    {
        $this->useruser->removeElement($useruser);
    }

    /**
     * Get useruser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUseruser()
    {
        return $this->useruser;
    }
}
