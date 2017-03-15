<?php

namespace ZeCashDeskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="base")
     */
    public function indexAction()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/responsable", name="responsable")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_responsable(){

        return $this->render('page_responsable.html.twig');
    }

    /**
     * @Route("/hote", name="hote")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_hote(){

        return $this->render('page_hote2caisse.html.twig');
    }


}
