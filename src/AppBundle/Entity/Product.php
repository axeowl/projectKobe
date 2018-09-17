<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="fk_product_category1_idx", columns={"category_idcategory"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="idproduct", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idproduct;

    /**
     * @var string
     *
     * @ORM\Column(name="productname", type="string", length=45, nullable=false)
     */
    private $productname;

    /**
     * @var bool
     *
     * @ORM\Column(name="purchased", type="boolean", nullable=false)
     */
    private $purchased = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=500, nullable=false)
     */
    private $path;

    /**
     * @var \Category
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_idcategory", referencedColumnName="idcategory")
     * })
     */
    private $categorycategory;

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

    public function getIdproduct()
    {
        return $this->idproduct;
    }

    public function getProductname()
    {
        return $this->productname;
    }

    public function setProductname(string $productname)
    {
        $this->productname = $productname;

        return $this;
    }

    public function getPurchased()
    {
        return $this->purchased;
    }

    public function setPurchased(bool $purchased)
    {
        $this->purchased = $purchased;

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath(string $path)
    {
        $this->path = $path;

        return $this;
    }

    public function getCategorycategory()
    {
        return $this->categorycategory;
    }

    public function setCategorycategory(Category $categorycategory)
    {
        $this->categorycategory = $categorycategory;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUseruser()
    {
        return $this->useruser;
    }

    public function addUseruser(User $useruser)
    {
        if (!$this->useruser->contains($useruser)) {
            $this->useruser[] = $useruser;
            $useruser->addProductproduct($this);
        }

        return $this;
    }

    public function removeUseruser(User $useruser)
    {
        if ($this->useruser->contains($useruser)) {
            $this->useruser->removeElement($useruser);
            $useruser->removeProductproduct($this);
        }

        return $this;
    }

}
