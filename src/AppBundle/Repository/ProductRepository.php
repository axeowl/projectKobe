<?php
/**
 * Created by PhpStorm.
 * User: benny
 * Date: 7/17/18
 * Time: 11:40 PM
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function getAllProduct()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * from product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteProduct($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "DELETE from product WHERE idProduct = $id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
}