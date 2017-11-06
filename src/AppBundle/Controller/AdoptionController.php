<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 23.10.2017
 * Time: 23:29
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdoptionController extends Controller
{
    /**
     * @Route("/adoptions/", name="adoptions")
     */
    public function showAction(){
        return $this->render('adoptions/adoptions.html.twig');
    }

}