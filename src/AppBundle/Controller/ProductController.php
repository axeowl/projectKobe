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
     * @Rest\Get("/getproduct{id}")
     */
    public function getAllAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->getAllProduct($id);
        if ($restresult == null) {
            return null;
        }
        return $restresult;
    }

    public function getAll($id)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->getAll($id);
        if ($restresult == null) {
            return null;
        }
        return $restresult;
    }

    /**
     * @Rest\Get("/getpurchasedproduct{id}")
     */
    public function getAllPurchasedAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->getAllPurchasedProduct($id);
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
     * @Rest\Get("/reinsertproduct{id}")
     */
    public function reinsertAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->reinsertProduct($id);
        if($restresult)
            return true;
        return false;
    }


    /**
     * @Rest\Get("/purchaseproduct{id}")
     */
    public function purchaseAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->purchaseProduct($id);
        if($restresult)
            return true;
        return false;
    }
    /**
     * @Rest\Get("/addproduct{productname}/{category}/{userid}")
     */
    public function addAction($productname, $category, $userid)
    {
        $res = $this->getAll($userid);
        if (empty($res))
        {
            $em = $this->getDoctrine()->getManager();
            $restresult = $em->getRepository(Product::class)->addProduct($productname, $category, $userid);
            if($restresult)
                return true;
            return false;
        }
        for($i = 0; $i<sizeof($res);$i++)
        {
            if ($res[$i]['productname'] == $productname)
            {
                return false;
            }
        }
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Product::class)->addProduct($productname, $category, $userid);
        if($restresult)
            return true;
        return false;

    }
}