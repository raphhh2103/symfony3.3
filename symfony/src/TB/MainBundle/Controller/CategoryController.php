<?php

namespace TB\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TB\MainBundle\Entity\Category;
use TB\MainBundle\Form\CategoryType;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository("MainBundle:Category");
        $categories = $repo->findAll();
        return $this->render("MainBundle:Category:index.html.twig", array("categories" => $categories));
    }

    public function updateAction(Category $cat, Request $request)
    {
        $form = $this->createForm(CategoryType::class, $cat);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            $this->addFlash("success", "La categorie ".$cat->getCategoryName()."a été mis à jour");
            return $this->redirectToRoute("main_category_index");
        }



        return $this->render("MainBundle:Category:update.html.twig", array("form" => $form->createView()));
    }

    public function createAction(Request $request)
    {
        $cat = new Category();
        $form = $this->createForm(CategoryType::class, $cat);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            return $this->redirectToRoute("main_category_index");
        }



        return $this->render("MainBundle:Category:create.html.twig", array("form" => $form->createView()));
    }

    public function deleteAction(Category $cat)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($cat);
        $em->flush();

        return $this->redirectToRoute("main_category_index");
    }
}
