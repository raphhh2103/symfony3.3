<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 01-09-17
 * Time: 09:55
 */

namespace TB\MainBundle\Utils;


class Mailer
{
    private $mailer_host;
    private $mailer_user;
    private $mailer_password;
    private $swift_mailer;

    public function __construct($mailer_hots, $mailer_user, $mailer_password, \Swift_Mailer $swift_mailer)
    {
        $this->mailer_host = $mailer_hots;
        $this->mailer_user = $mailer_user;
        $this->mailer_password = $mailer_password;
        $this->swift_mailer = $swift_mailer;
    }

    public function testParam()
    {
        dump($this->mailer_host);
        dump($this->mailer_user);
        dump($this->mailer_password);die;
    }

    public function sendEmail($sujet, $contenu, $email)
    {
        $message = \Swift_Message::newInstance();
        $message->setSubject($sujet);
        $message->setFrom($this->mailer_user);
        $message->setBody($contenu,'text/html');
        $message->setTo($email);
        $this->swift_mailer->send($message);
    }
}