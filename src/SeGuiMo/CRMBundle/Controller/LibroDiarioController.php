<?php

namespace SeGuiMo\CRMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SeGuiMo\CRMBundle\Entity\LibroDiario;
use SeGuiMo\CRMBundle\Form\LibroDiarioType;

/**
 * LibroDiario controller.
 *
 * @Route("/librodiario")
 */
class LibroDiarioController extends Controller
{

    /**
     * Lists all LibroDiario entities.
     *
     * @Route("/", name="librodiario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SeGuiMoCRMBundle:LibroDiario')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new LibroDiario entity.
     *
     * @Route("/", name="librodiario_create")
     * @Method("POST")
     * @Template("SeGuiMoCRMBundle:LibroDiario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new LibroDiario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('librodiario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a LibroDiario entity.
     *
     * @param LibroDiario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(LibroDiario $entity)
    {
        $form = $this->createForm(new LibroDiarioType(), $entity, array(
            'action' => $this->generateUrl('librodiario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LibroDiario entity.
     *
     * @Route("/new", name="librodiario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LibroDiario();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a LibroDiario entity.
     *
     * @Route("/{id}", name="librodiario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:LibroDiario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LibroDiario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing LibroDiario entity.
     *
     * @Route("/{id}/edit", name="librodiario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:LibroDiario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LibroDiario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a LibroDiario entity.
    *
    * @param LibroDiario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LibroDiario $entity)
    {
        $form = $this->createForm(new LibroDiarioType(), $entity, array(
            'action' => $this->generateUrl('librodiario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LibroDiario entity.
     *
     * @Route("/{id}", name="librodiario_update")
     * @Method("PUT")
     * @Template("SeGuiMoCRMBundle:LibroDiario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:LibroDiario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LibroDiario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('librodiario_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a LibroDiario entity.
     *
     * @Route("/{id}", name="librodiario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SeGuiMoCRMBundle:LibroDiario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LibroDiario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('librodiario'));
    }

    /**
     * Creates a form to delete a LibroDiario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('librodiario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
