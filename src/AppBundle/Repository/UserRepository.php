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
        $sql = "INSERT INTO user (email, username, password, isConnected) VALUES ('$email', '$username', '$password', 'false')";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }

    public function validateUser($email, $password)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserInfo($email)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT iduser FROM user WHERE email = '$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}