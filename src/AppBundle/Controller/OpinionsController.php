<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 24.10.2017
 * Time: 00:35
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OpinionsController extends Controller
{
    /**
     * @Route("/opinions/", name="opinions")
     */

    public function showAction(){
        return $this->render('opinions/opinions.html.twig');
    }

}