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
     * @Route("/page_responsable")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function page_responsable(){

        return $this->render('page_responsable.html.twig');
    }
}
