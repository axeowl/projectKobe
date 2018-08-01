<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="fk_product_category1_idx", columns={"category_idCategory"})})
 * @ORM\Entity
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
     * @ORM\Column(name="path", type="string", length=500, nullable=true)
     */
    private $path;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_idCategory", referencedColumnName="idCategory")
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

}

