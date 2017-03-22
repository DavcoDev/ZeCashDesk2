<?php

namespace ZeCashDeskBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use ZeCashDeskBundle\Entity\Items;

/**
 * terminal controller
 *
 * @Route("terminal")
 */
class TerminalController extends Controller
{
//    /**
//     * @Route("/genCode/", name="genCode")
//     */
//    public function indexAction(Items $item)
//    {
//        return new JsonResponse(array(
//            "nameItem" => $item->getNameItem(),
//            "gencode" => $item->getGencode(),
//            "prixvente" => $item->getSellPrice()
//        ));
//
//    }


    /**
     * Permet de récupérer l'article correspondant au gencode
     * au format JSON
     *
     * @Route("/genCode/", name="genCode")
     */
    public function findItemAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeCashDeskBundle:Items');
        $item = $repository->findByGencode($request->get('gencode'));

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $item = $serializer->serialize($item, 'json');
        $item = json_decode($item);

        return new JsonResponse($item);
    }
}
