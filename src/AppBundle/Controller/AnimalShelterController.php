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


        $carouselFile = fopen($_SERVER['DOCUMENT_ROOT'].'/pagecontent/homepage/carousel.txt', "r");
        $carouselFileRead = fread($carouselFile, filesize($_SERVER['DOCUMENT_ROOT'].'/pagecontent/homepage/carousel.txt'));
        $carouselArray = json_decode($carouselFileRead);

        $mainArticleFile = fopen($_SERVER['DOCUMENT_ROOT'].'/pagecontent/homepage/mainArticle.txt', "r");
        $mainArticleFileRead = fread($mainArticleFile, filesize($_SERVER['DOCUMENT_ROOT'].'/pagecontent/homepage/mainArticle.txt'));
        $mainArticle = json_decode($mainArticleFileRead);


        return $this->render(
            'homepage/show.html.twig',
            array(
                'arrayOfAnimals' => $carouselArray,
                'mainArticle' => $mainArticle
        ));
    }
}