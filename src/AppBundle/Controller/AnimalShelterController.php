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
    private function generateCarrouselArray(){
        $animal1 = array(
            'image' => 'css/images/kot1.jpg',
            'title' => 'MEOW!',
            'desc1' => 'Wiecznie uśmiechnięty i zadowolony z życia kotek poszukuje kochającej mamy.',
            'desc2' => 'Kot obecnie w domu zastępczym. Nie umie korzystać z kuwety, zaznajomiony z używaniem ludzkiego kibelka.',
            'link' => '#');

        $arrayOfAnimals = array(
            $animal1,
        );

        return $arrayOfAnimals;
    }
    private function generateMainArticle(){
        $title = 'Kot domowy niewychodzący – jak się nim opiekować?';
        $desc1 = 'Choć w dzisiejszych czasach coraz większa liczba kotów trzymana jest wyłącznie w domu, wielu osobom takie postępowanie wydaje się niewłaściwe. Czy rzeczywiście kot w domu jest narażony na mniej niebezpieczeństw? Jak dbać o kota domowego, by jak najdłużej cieszył się dobrym zdrowiem?';
        $desc2 = 'Koty bywają wypuszczane na zewnątrz z różnych powodów. Niektórzy właściciele są przekonani, że bez możliwości wychodzenia ich kot nie będzie w pełni szczęśliwy...';
        $ref = "https://royalcanin.pl/blog/kot-domowy-niewychodzacy-jak-sie-nim-opiekowac/";

        $mainArticle = array(
            'title' => $title,
            'desc1' => $desc1,
            'desc2' => $desc2,
            'ref' => $ref
        );

        return $mainArticle;
    }

}