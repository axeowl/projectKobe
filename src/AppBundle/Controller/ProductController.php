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
use AppBundle\Entity\Product;

class ProductController extends FOSRestController
{
    /**
     * @Rest\Get("/product")
     */
    public function getAction()
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->getAllProduct();
        if ($restresult == null) {
            return new View("there are no products exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;

        /*$repository = $this->getDoctrine()->getRepository(Product::class);
        $query = $repository->createQueryBuilder('p')->getQuery();
        $products = $query->getResult();
        return $products;*/
    }
}