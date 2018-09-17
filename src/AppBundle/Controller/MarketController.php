<?php
/**
 * Created by PhpStorm.
 * User: Benny
 * Date: 17/09/2018
 * Time: 11:11
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Market;

class MarketController extends FOSRestController
{
    /**
     * @Rest\Get("/getmarket")
     */
    public function getAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $restresult = $em->getRepository(Market::class)->getAllMarket();
        if ($restresult == null) {
            return new View("there are no products exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }
}