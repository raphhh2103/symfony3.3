<?php

namespace TB\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TB\MainBundle\Entity\Platform;
use TB\MainBundle\Form\PlatformType;

class PlatformController extends Controller
{
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository("MainBundle:Platform");
        $platform = $repo->findAll();
        return $this->render('MainBundle:Platform:index.html.twig', array('platform' => $platform));
    }

    public function updateAction(Platform $plat, Request $request)
    {
        $form = $this->createForm(PlatformType::class, $plat);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $this->addFlash("success", "La platforme ".$plat->getPlatformName()."a été mis à jour");
            $em->persist($plat);
            $em->flush();

            return $this->redirectToRoute("main_platform_index");
        }



        return $this->render("MainBundle:Platform:update.html.twig", array("form" => $form->createView()));
    }

    public function createAction(Request $request)
    {
        $plat = new Platform();
        $form = $this->createForm(PlatformType::class, $plat);

        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plat);
            $em->flush();
            $this->addFlash("success","nouvelle platform créer");
            return $this->redirectToRoute("main_platform_index");
        }
        return $this->render("MainBundle:Platform:create.html.twig", array("form" => $form->createView()));
    }

    public function deleteAction(Platform $plat)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($plat);
        $em->flush();

        return $this->redirectToRoute("main_platform_index");
    }
}
