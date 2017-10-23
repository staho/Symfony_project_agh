<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 23.10.2017
 * Time: 23:09
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ArticlesController extends Controller
{
    /**
     * @Route("/articles/", name="articles_show")
     */
    public function showAction(){
        return $this->render('base.html.twig');

    }
}