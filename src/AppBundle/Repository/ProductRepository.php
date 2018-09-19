<?php
/**
 * Created by PhpStorm.
 * User: benny
 * Date: 7/17/18
 * Time: 11:40 PM
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Repository\EnumCategory;

class ProductRepository extends EntityRepository
{
    protected $categoryArray = array('assets/icon/beans.png',
        'assets/icon/cake.png',
        'assets/icon/candy.png',
        'assets/icon/cereal.png',
        'assets/icon/chips.png',
        'assets/icon/chocolate.png',
        'assets/icon/coffee.png',
        'assets/icon/corn.png',
        'assets/icon/fish.png',
        'assets/icon/flour.png',
        'assets/icon/honey.png',
        'assets/icon/jam.png',
        'assets/icon/juice.png',
        'assets/icon/milk.png',
        'assets/icon/nuts.png',
        'assets/icon/oil.png',
        'assets/icon/pasta.png',
        'assets/icon/rice.png',
        'assets/icon/soda.png',
        'assets/icon/spices.png',
        'assets/icon/sugar.png',
        'assets/icon/tea.png',
        'assets/icon/tomato-sauce.png',
        'assets/icon/vinegar.png',
        'assets/icon/water.png');

    public function getAllProduct($id)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT * from product, user, user_has_product WHERE user_has_product.user_iduser = user.iduser AND user_has_product.product_idproduct = product.idproduct AND user.iduser = $id ORDER BY = product.productName";
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
        $path =  $this->categoryArray[$category-1];
        $conn = $this->getEntityManager()->getConnection();
        $sql = "INSERT INTO product (idproduct, productname, purchased, path, category_idcategory) VALUES (DEFAULT, '$productname', 0, '$path', $category)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO user_has_product (user_iduser, product_idproduct) VALUES (".$userid.",".$conn->lastInsertId().")";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
}