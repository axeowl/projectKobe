<?php
/**
 * Created by PhpStorm.
 * User: Benny
 * Date: 17/09/2018
 * Time: 11:12
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Market;

class MarketRepository extends EntityRepository
{
    public function getAllMarket()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * from market ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}