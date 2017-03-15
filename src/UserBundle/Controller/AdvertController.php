<?php
namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdvertController extends Controller
{
    /**
     * @Security("has_role('ROLE_USER')")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addAction(Request $request)
    {

    }
}