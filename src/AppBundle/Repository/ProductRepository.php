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
        $sql = "DELETE from product WHERE idproduct = $id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
        
    }

    public function addProduct($productname, $category)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "INSERT INTO product (idproduct, productname, purchased, path, category_idcategory) VALUES (DEFAULT, '$productname', 0, 'https://www.dropbox.com/s/peanuwuu9cg8eq7/pasta.png?dl=1', $category)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
}