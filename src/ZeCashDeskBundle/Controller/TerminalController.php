<?php

namespace ZeCashDeskBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


/**
 * terminal controller
 *
 * @Route("terminal")
 */
class TerminalController extends Controller {
	/**
	 * @Route("/genCode", name="genCode")
	 * @param Request $request
	 *
	 * @return JsonResponse
	 */
	public function indexAction( Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeCashDeskBundle:Items');

        $items = $repository->findByGenCode($request->get('codebarre'));


        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $item = $serializer->serialize($items, 'json');
        $item = json_decode($item);

		return new JsonResponse( $item );
	}

	/**
	 * @Security("has_role('ROLE_USER')")
	 * @Route("/", name="terminal")
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function page_terminal() {
		return $this->render( 'terminal.twig' );
	}
}
