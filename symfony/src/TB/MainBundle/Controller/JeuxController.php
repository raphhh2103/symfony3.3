<?php

namespace TB\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TB\MainBundle\Entity\Jeux;
use TB\MainBundle\Form\JeuxType;
use TB\MainBundle\Form\ModifJ;
use TB\MainBundle\Repository\JeuxRepository;
use TB\MainBundle\Utils\FileService;

class JeuxController extends Controller
{
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository("MainBundle:Jeux");
        $jeux = $repo->findAll();
        return $this->render('MainBundle:Jeux:index.html.twig', array("jeux" => $jeux));
    }

    public function createAction(Request $request, FileService $fileService)
    {
        $jeux = new Jeux();
        $form = $this->createForm(JeuxType::class, $jeux);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($jeux);
            foreach ($jeux->getGamePlatforms() as $p){
                $p->setJeux($jeux);
                $em->persist($p);
            }
            foreach ($jeux->getPictures() as $pict){
                //déplacer l image
                $url = $fileService->moveUploadedFile($pict->getFiles());
                $pict->setPictureURL($url);
                $pict->setJeux($jeux);
                $em->persist($pict);
            }
            $em->flush();
            return $this->redirectToRoute("main_jeux_index");
        }
        return $this->render("MainBundle:Jeux:create.html.twig", array("form" => $form->createView()));
    }

    public function detailsAction($id)
    {
        $repo = $this->getDoctrine()->getRepository("MainBundle:Jeux");
        $jeux = $repo->findGameWhithDetails($id);
            return $this->render("MainBundle:Jeux:details.html.twig", array("jeux" => $jeux));
    }

    public function updateAction(Jeux $jeux, Request $request, FileService $fileService)
    {
        $form = $this->createForm(ModifJ::class, $jeux);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($jeux);
            foreach ($jeux->getGamePlatforms() as $p){
                $p->setJeux($jeux);
                $em->persist($p);
            }
            foreach ($jeux->getPictures() as $pict){
                //déplacer l image
                $url = $fileService->moveUploadedFile($pict->getFiles());
                $pict->setPictureURL($url);
                $pict->setJeux($jeux);
                $em->persist($pict);
            }
            $em->flush();
            return $this->redirectToRoute("main_jeux_index");
        }



        return $this->render("MainBundle:Jeux:update.html.twig", array("form" => $form->createView()));
    }

}
