<?php
/**
 * Created by PhpStorm.
 * User: benny
 * Date: 7/30/18
 * Time: 11:11 AM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class UserController extends FOSRestController
{

    /**
     * @Rest\Get("/register{email}/{username}/{password}")
     */

    public function registerNewUserAction($email, $username, $password)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(User::class)->registerNewUser($email, $username, $password);
        /*if ($restresult == null) {
            return new View("there are no products exist", Response::HTTP_NOT_FOUND);
        }*/
        return $restresult;
    }

    /**
     * @Rest\Get("/login{email}/{password}")
     */

    public function loginAction($email, $password)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(User::class)->validateUser($email, $password);
        /*if ($restresult == null) {
            return new View("there are no products exist", Response::HTTP_NOT_FOUND);
        }*/
        return $restresult;
    }

    /**
     * @Rest\Get("/userinfo{email}")
     */

    public function getUserInfo($email, $password)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(User::class)->getUserInfo($email);
        /*if ($restresult == null) {
            return new View("there are no products exist", Response::HTTP_NOT_FOUND);
        }*/
        return $restresult;
    }
}