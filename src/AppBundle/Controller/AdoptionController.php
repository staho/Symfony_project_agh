<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 23.10.2017
 * Time: 23:29
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Entity\AnimalPost;
use AppBundle\Form\Entity\AnimalPostType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdoptionController extends Controller
{
    /**
     * @Route("/adoptions/{id}", name="adoption_show")
     */
    public function showAction(AnimalPost $post){
        return $this->render('adoption/adoption.html.twig', array(
            'post' => $post
        ));
    }

    /**
     * @Route("/adoptions/", name="adoptions")
     */
    public function indexAction(Request $request){
        $posts = $this->getDoctrine()
            ->getManager()
            ->createQueryBuilder()
            ->from('AppBundle:Entity\AnimalPost', 'p')
            ->select('p');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts,
            $request->query->get('page', 1),
            5
        );

        return $this->render('adoptions/adoptions.html.twig', array(
            'posts' => $pagination
            ));
    }

    /**
     * @Route("/adoptions/add", name="add_adoption")
     */
    public function showActionAdd(){
        $form = $this->createForm(new AnimalPostType());

        return $this->render('addadoption/addadoption.html.twig', array(
            'form' => $form->createView()
        ));
    }


}