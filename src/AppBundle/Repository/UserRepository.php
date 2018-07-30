<?php
/**
 * Created by PhpStorm.
 * User: benny
 * Date: 7/17/18
 * Time: 11:40 PM
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\User;

class UserRepository extends EntityRepository
{
    public function registerNewUser($email, $username, $password)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$password')";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
}