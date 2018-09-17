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
    protected $categoryArray = array('https://www.dropbox.com/s/vrnl1ap3gul5hlg/beans.png?dl=1',
        'https://www.dropbox.com/s/jw4eolq4cdwtakn/cake.png?dl=1',
        'https://www.dropbox.com/s/q3zj79m0rht9c4h/candy.png?dl=1',
        'https://www.dropbox.com/s/5pv8az8d4uqx50x/cereal.png?dl=1',
        'https://www.dropbox.com/s/zgpxvfrjo17w2p2/chips.png?dl=1',
        'https://www.dropbox.com/s/uj11rrgov7jzlan/chocolate.png?dl=1',
        'https://www.dropbox.com/s/b67bf1h0tn9dic2/coffee.png?dl=1',
        'https://www.dropbox.com/s/l9xswovgbvkhktp/corn.png?dl=1',
        'https://www.dropbox.com/s/x8kcliwx6ck03yg/fish.png?dl=1',
        'https://www.dropbox.com/s/bfk0apc4pz21fgo/flour.png?dl=1',
        'https://www.dropbox.com/s/wmg8ch84b2opap5/honey.png?dl=1',
        'https://www.dropbox.com/s/ow7up8s7tirc3y3/jam.png?dl=1',
        'https://www.dropbox.com/s/0vw8ybtz88ml71y/juice.png?dl=1',
        'https://www.dropbox.com/s/v29ng5lklt59fze/milk.png?dl=1',
        'https://www.dropbox.com/s/3m8w34m8fpl1nnh/nuts.png?dl=1',
        'https://www.dropbox.com/s/chsyr44mkg7duhh/oil.png?dl=1',
        'https://www.dropbox.com/s/nwgwjs6x28eq5f2/pasta.png?dl=1',
        'https://www.dropbox.com/s/269iwkt0seievn1/rice.png?dl=1',
        'https://www.dropbox.com/s/fmbzukmeul7sk2d/soda.png?dl=1',
        'https://www.dropbox.com/s/al5jtq5fwkfbd2d/spices.png?dl=1',
        'https://www.dropbox.com/s/vccqa2qyn3vtmvq/sugar.png?dl=1',
        'https://www.dropbox.com/s/tm30q8onaftf4jb/tea.png?dl=1',
        'https://www.dropbox.com/s/p32nwt281r9jrq5/tomato-sauce.png?dl=1',
        'https://www.dropbox.com/s/lo2zfr9hnukltpt/vinegar.png?dl=1',
        'https://www.dropbox.com/s/kwc1muj9brpwdpg/water.png?dl=1');

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
        $sql = "INSERT INTO product (idproduct, productname, purchased, path, category_idcategory) VALUES (DEFAULT, '$productname', 0, $this->categoryArray, $category)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $sql = "INSERT INTO user_has_product (user_iduser, product_idproduct) VALUES (".$userid.",".$conn->lastInsertId().")";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
}