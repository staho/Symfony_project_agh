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

class AnimalShelterController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function showAction(){
        return $this->render('homepage/show.html.twig');

    }

}