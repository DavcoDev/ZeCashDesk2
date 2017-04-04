<?php

namespace ZeCashDeskBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="base")
     */
    public function indexAction()
    {
       if($this->isGranted("ROLE_ADMIN")) {
           return $this->render('page_responsable.html.twig');
       }
       if($this->isGranted("ROLE_USER")){
           return $this->render('page_hote2caisse.html.twig');

       }
        else return $this->render('base.html.twig');
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/responsable", name="responsable")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_responsable(){

        return $this->render('page_responsable.html.twig');
    }

    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/hote", name="hote")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_hote(){

        return $this->render('page_hote2caisse.html.twig');
    }

}
