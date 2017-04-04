<?php

namespace ZeCashDeskBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use ZeCashDeskBundle\Entity\Items;
use ZeCashDeskBundle\Entity\Sales;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ZeCashDeskBundle\Entity\Tickets;

/**
 * Sale controller.
 *
 * @Route("sales")
 */
class SalesController extends Controller
{
    /**
     * @Route("/insert/{id}/{ticketId}", name="sale_insert")
     * @param Request $request
     * @param Items $item
     * @param Tickets $tickets
     * @return JsonResponse
     * @ParamConverter("tickets", class="ZeCashDeskBundle:Tickets", options={"id" = "ticketId"})
     *
     */
    public function insertAction(Request $request, Items $item, Tickets $tickets)
    {
        $scanned = new Sales();

        $scanned->setSalesQty($request->get('salesQty'));

//		$itemId = $request->get( 'itemId' );
//		$em         = $this->getDoctrine()->getManager();
//		$repository = $em->getRepository( 'ZeCashDeskBundle:Items' );//
//		$item = $repository->find($itemId);

        $scanned->setItems($item);
        $scanned->setTickets($tickets);

        $em = $this->getDoctrine()->getManager();
        $em->persist($scanned);
        $em->flush();
//		dump( $scanned->getId() );

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $sc = $scanned->getId();
        $idSale = $serializer->serialize($sc, 'json');
        $idSale = json_decode($idSale);

        return new JsonResponse($idSale);
    }


    /**
     * Lists all sale entities.
     *
     * @Route("/", name="sales_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sales = $em->getRepository('ZeCashDeskBundle:Sales')->findAll();

        return $this->render('sales/index.html.twig', array(
            'sales' => $sales,
        ));
    }

    /**
     * Creates a new sale entity.
     *
     * @Route("/new", name="sales_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function newAction(Request $request)
    {
        $sale = new Sales();
        $form = $this->createForm('ZeCashDeskBundle\Form\SalesType', $sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sale);
            $em->flush();

            return $this->redirectToRoute('sales_show', array('id' => $sale->getId()));
        }

        return $this->render('sales/new.html.twig', array(
            'sale' => $sale,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sale entity.
     *
     * @Route("/{id}", name="sales_show")
     * @Method("GET")
     * @param Sales $sale
     * @return Response
     */
    public function showAction(Sales $sale)
    {
        $deleteForm = $this->createDeleteForm($sale);

        return $this->render('sales/show.html.twig', array(
            'sale' => $sale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sale entity.
     *
     * @Route("/{id}/edit", name="sales_edit")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Sales $sale
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction(Request $request, Sales $sale)
    {
        $deleteForm = $this->createDeleteForm($sale);
        $editForm = $this->createForm('ZeCashDeskBundle\Form\SalesType', $sale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sales_edit', array('id' => $sale->getId()));
        }

        return $this->render('sales/edit.html.twig', array(
            'sale' => $sale,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sale entity.
     *
     * @Route("/{id}", name="sales_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Sales $sale
     * @return JsonResponse
     */
    public function deleteAction(Request $request, Sales $sale)
    {
        $form = $this->createDeleteForm($sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sale);
            $em->flush();
        }
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $id = $sale->getId();
        $idSale = $serializer->serialize($id, 'json');
        $idSale = json_decode($idSale);

        return new JsonResponse($idSale);
    }

    /**
     * Creates a form to delete a sale entity.
     *
     * @param Sales $sale The sale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sales $sale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sales_delete', array('id' => $sale->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
