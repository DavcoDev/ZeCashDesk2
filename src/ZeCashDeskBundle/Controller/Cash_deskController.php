<?php

namespace ZeCashDeskBundle\Controller;

use ZeCashDeskBundle\Entity\Cash_desk;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cash_desk controller.
 *
 * @Route("cash_desk")
 */
class Cash_deskController extends Controller
{
    /**
     * Lists all cash_desk entities.
     *
     * @Route("/", name="cash_desk_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cash_desks = $em->getRepository('ZeCashDeskBundle:Cash_desk')->findAll();

        return $this->render('cash_desk/index.html.twig', array(
            'cash_desks' => $cash_desks,
        ));
    }

    /**
     * Creates a new cash_desk entity.
     *
     * @Route("/new", name="cash_desk_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $cash_desk = new Cash_desk();
        $form = $this->createForm('ZeCashDeskBundle\Form\Cash_deskType', $cash_desk);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cash_desk);
            $em->flush();

            return $this->redirectToRoute('cash_desk_show', array('id' => $cash_desk->getId()));
        }

        return $this->render('cash_desk/new.html.twig', array(
            'cash_desk' => $cash_desk,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cash_desk entity.
     *
     * @Route("/{id}", name="cash_desk_show")
     * @Method("GET")
     * @param Cash_desk $cash_desk
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Cash_desk $cash_desk)
    {
        $deleteForm = $this->createDeleteForm($cash_desk);

        return $this->render('cash_desk/show.html.twig', array(
            'cash_desk' => $cash_desk,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cash_desk entity.
     *
     * @Route("/{id}/edit", name="cash_desk_edit")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Cash_desk $cash_desk
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Cash_desk $cash_desk)
    {
        $deleteForm = $this->createDeleteForm($cash_desk);
        $editForm = $this->createForm('ZeCashDeskBundle\Form\Cash_deskType', $cash_desk);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cash_desk_edit', array('id' => $cash_desk->getId()));
        }

        return $this->render('cash_desk/edit.html.twig', array(
            'cash_desk' => $cash_desk,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cash_desk entity.
     *
     * @Route("/{id}", name="cash_desk_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Cash_desk $cash_desk
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Cash_desk $cash_desk)
    {
        $form = $this->createDeleteForm($cash_desk);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cash_desk);
            $em->flush();
        }

        return $this->redirectToRoute('cash_desk_index');
    }

    /**
     * Creates a form to delete a cash_desk entity.
     *
     * @param Cash_desk $cash_desk The cash_desk entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cash_desk $cash_desk)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cash_desk_delete', array('id' => $cash_desk->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
