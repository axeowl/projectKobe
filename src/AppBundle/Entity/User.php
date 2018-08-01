<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=250, nullable=false)
     */
    private $password;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="useruser")
     * @ORM\JoinTable(name="user_has_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="User_idUser", referencedColumnName="idUser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Product_idProduct", referencedColumnName="idProduct")
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


    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add productproduct
     *
     * @param \AppBundle\Entity\Product $productproduct
     *
     * @return User
     */
    public function addProductproduct(\AppBundle\Entity\Product $productproduct)
    {
        $this->productproduct[] = $productproduct;

        return $this;
    }

    /**
     * Remove productproduct
     *
     * @param \AppBundle\Entity\Product $productproduct
     */
    public function removeProductproduct(\AppBundle\Entity\Product $productproduct)
    {
        $this->productproduct->removeElement($productproduct);
    }

    /**
     * Get productproduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductproduct()
    {
        return $this->productproduct;
    }
}
