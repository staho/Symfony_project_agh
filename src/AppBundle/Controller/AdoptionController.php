<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 23.10.2017
 * Time: 23:29
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Entity\AnimalPost;
use AppBundle\Entity\Reservation;
use AppBundle\Form\Entity\AnimalPostType;
use AppBundle\Form\ReservationType;
use ClassesWithParents\D;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdoptionController extends Controller
{
    /**
     * @Route("/adoptions/{id}", name="adoption_show")
     */
    public function showAction(AnimalPost $post, Request $request){

        if ($user = $this->getUser()){
            $reservation = new Reservation();
            $reservation->setCreatedAt(new \DateTime("now"));
            $reservation->setReservationDate(new \DateTime("now"));
            $reservation->setUser($user);
            $reservation->setAnimalPost($post);

            $form = $this->createForm(ReservationType::class, $reservation);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->persist($reservation);
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('Success', 'Reservation is successfully added');
            }


            return $this->render('adoption/adoption.html.twig', array(
                'post' => $post,
                'form' => $form->createView(),
            ));

        }

        return $this->render("adoption/adoption.html.twig", array(
            'post' => $post,
            'form' => null,
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
     * @Route("/addadoption", name="add_adoption")
     */
    public function showActionAdd(Request $request){

        $post = new AnimalPost();
        $post->setCreatedAt(new \DateTime("now"));

        //$post->serUser($user);
        if ($user = $this->getUser()){
            $form = $this->createForm(AnimalPostType::class, $post);
            $form->handleRequest($request);

            if($form->isValid()){
                $this->getDoctrine()->getManager()->persist($post);
                $this->getDoctrine()->getManager()->flush();

                $this->addFlash('success', "Post został dodany");

                return $this->redirectToRoute('adoption_show', array('id'=>$post->getId()));
            }

            return $this->render('addadoption/addadoption.html.twig', array(
                'form' => $form->createView()
            ));

        }

        return null;

    }


}