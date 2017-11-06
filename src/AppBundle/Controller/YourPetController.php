<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 24.10.2017
 * Time: 00:30
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class YourPetController extends Controller
{
    /**
     * @Route("/yourpet", name="yourpet")
     */

    public function showAction(){
        return $this->render('yourpet/yourpet.html.twig');
    }

}