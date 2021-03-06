<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcategory", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="categoryname", type="string", length=45, nullable=false)
     */
    private $categoryname;

    public function getIdcategory()
    {
        return $this->idcategory;
    }

    public function getCategoryname()
    {
        return $this->categoryname;
    }

    public function setCategoryname(string $categoryname)
    {
        $this->categoryname = $categoryname;

        return $this;
    }


}
