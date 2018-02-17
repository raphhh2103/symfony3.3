<?php

namespace TB\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use TB\MainBundle\Entity\User;
use TB\MainBundle\Form\UserType;

class UserController extends Controller
{
    public function loginAction()
    {
        return $this->render('MainBundle:User:login.html.twig', array());
    }

    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $u = new User();
        $form = $this->createForm(UserType::class, $u);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            $u->setUserSalt(uniqid());
            $encoded = $encoder->encodePassword($u, $u->getUserPassword());
            $u->setUserPassword($encoded);
            $em = $this->getDoctrine()->getManager();
            $em->persist($u);
            $em->flush();
        }
        return $this->render('MainBundle:User:register.html.twig', array(
            "form"=>$form->createView()
        ));
    }
}
