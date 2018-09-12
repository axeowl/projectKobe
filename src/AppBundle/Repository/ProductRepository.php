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
    public function getAllProduct($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * from product, user, user_has_product WHERE user_has_product.user_iduser = user.iduser AND user_has_product.product_idproduct = product.idproduct AND user.iduser = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteProduct($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "DELETE from user_has_product WHERE product_idproduct = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $sql = "DELETE from product WHERE idproduct = $id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    public function addProduct($productname, $category, $userid)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "INSERT INTO product (idproduct, productname, purchased, path, category_idcategory) VALUES (DEFAULT, '$productname', 0, 'https://www.dropbox.com/s/peanuwuu9cg8eq7/pasta.png?dl=1', $category)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO user_has_product (user_iduser, product_idproduct) VALUES (".$userid.",".$conn->lastInsertId().")";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
}