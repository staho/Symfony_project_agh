<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 16.10.2017
 * Time: 15:22
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AnimalShelterController extends Controller
{
    /**
     * @Route("/{name}")
     */

    public function showAction($name){
        return $this->render('homepage/show.html.twig', array('name' => $name));

    }

}