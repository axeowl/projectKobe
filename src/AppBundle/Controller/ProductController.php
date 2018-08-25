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
     * @Rest\Get("/getproduct")
     */
    public function getAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->getAllProduct();
        if ($restresult == null) {
            return new View("there are no products exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

    /**
     * @Rest\Get("/deleteproduct{id}")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->deleteProduct($id);
        if($restresult)
            return true;
        return false;
    }

    /**
     * @Rest\Get("/addproduct{productname}/{category}")
     */
    public function addAction($productname, $category)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->addProduct($productname, $category);
        if($restresult)
            return true;
        return false;
    }
}