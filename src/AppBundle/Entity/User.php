<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isConnected", type="boolean", nullable=false)
     */
    private $isconnected;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="useruser")
     * @ORM\JoinTable(name="user_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_iduser", referencedColumnName="iduser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="product_idproduct", referencedColumnName="idproduct")
     *   }
     * )
     */
    private $productproduct;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productproduct = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsconnected(): ?bool
    {
        return $this->isconnected;
    }

    public function setIsconnected(bool $isconnected): self
    {
        $this->isconnected = $isconnected;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductproduct(): Collection
    {
        return $this->productproduct;
    }

    public function addProductproduct(Product $productproduct): self
    {
        if (!$this->productproduct->contains($productproduct)) {
            $this->productproduct[] = $productproduct;
        }

        return $this;
    }

    public function removeProductproduct(Product $productproduct): self
    {
        if ($this->productproduct->contains($productproduct)) {
            $this->productproduct->removeElement($productproduct);
        }

        return $this;
    }

}

