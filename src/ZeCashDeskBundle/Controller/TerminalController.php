<?php

namespace ZeCashDeskBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use ZeCashDeskBundle\Entity\Items;

/**
 * terminal controller
 *
 * @Route("terminal")
 */
class TerminalController extends Controller
{
    /**
     * @Route("/genCode/", name="genCode")
     */
    public function indexAction(Items $item)
    {
        return new JsonResponse(array(
            "nameItem" => $item->getNameItem(),
            "gencode" => $item->getGencode(),
            "prixvente" => $item->getSellPrice()
        ));

    }

}
