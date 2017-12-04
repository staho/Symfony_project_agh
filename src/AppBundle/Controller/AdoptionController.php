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
        $this->saveHighlights();
        $hlArray = $this->readHighlights();
        return $this->render('adoptions/adoptions.html.twig', array(
            'hlArray' => $hlArray
        ));
    }

    private function saveHighlights(){

        $array = array("title" => "Piesek Leszek",
            "desc1" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo.etur orci metus a justo. Aliquam ac congue nunc.",
            "desc2" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo.etur orci metus a justo. Aliquam ac congue nunc.",
            "link" => "leszek420",
            "image" => "css/images/imageshl/pies.jpg");
        $array1 = array("title" => "Acapulco",
            "desc1" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo.etur orci metus a justo. Aliquam ac congue nunc.",
            "desc2" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo.etur orci metus a justo. Aliquam ac congue nunc.",
            "link" => "acapulco069",
            "image" => "css/images/imageshl/pies2.jpg");
        $arrays = array($array, $array1);

        $highlights = json_encode($arrays);
        $adoptionHighlights = fopen($_SERVER['DOCUMENT_ROOT'].'/pagecontent/adoptionhighlights/highlights.txt', "w");
        $bufor = fwrite($adoptionHighlights, $highlights);


    }

    private function readHighlights(){

        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/pagecontent/adoptionhighlights/highlights.txt', "r");
        $filebuf = fread($file, filesize($_SERVER['DOCUMENT_ROOT'].'/pagecontent/adoptionhighlights/highlights.txt'));
        $hlArray = json_decode($filebuf);

        return $hlArray;
    }


}