<?php
/**
 * Created by PhpStorm.
 * User: benny
 * Date: 7/17/18
 * Time: 11:19 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use App\Entity\Product;


class UserController extends FOSRestController
{
    /**
     * @Route("/base.html.twig", name="geo")
     */
    public function getAction()
    {
        $restresult = $this->getDoctrine()->getRepository('AppBundle:Product')->getAllProduct();
        if ($restresult === null) {
            return new View("there are no products exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }
}