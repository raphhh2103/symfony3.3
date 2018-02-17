<?php

namespace TB\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TB\MainBundle\MainBundle;
use TB\MainBundle\Utils\Mailer;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainBundle:Home:index.html.twig', array());
    }

    public function sendEmailAction(Request $request, Mailer $mailer)
    {
        //$_POST['']
        $nom = $request->request->get('name');
        $email = $request->request->get('email');
        $sujet = $request->request->get('sujet');
        $message = $request->request->get('message');

//        dump($email);die;
        $mailer->sendEmail($sujet, $this->renderView('MainBundle:Home:mail.html.twig', ['nom' => $nom, 'message' => $message]), $email);

        return $this->redirectToRoute('main_index');
        //recupération $_GET['']
//        $request->query->get('');
    }

    public function aboutUsAction()
    {
        return $this->render('MainBundle:Home:aboutUs.html.twig', array());
    }

    public function contactAction()
    {

        return $this->render('MainBundle:Home:contact.html.twig', array());
    }


}
