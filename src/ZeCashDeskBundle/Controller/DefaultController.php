<?php

namespace ZeCashDeskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/responsable")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_responsable(){

        return $this->render('page_responsable.html.twig');
    }

    /**
     * @Route("/hote")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_hote(){

        return $this->render('page_hote2caisse.html.twig');
    }

    /**
     * @Route("/terminal")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_terminal()
    {
        return $this->render('cash_desk.html.twig');
    }


}
