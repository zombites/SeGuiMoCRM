<?php

namespace SeGuiMo\CRMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SeGuiMo\CRMBundle\Entity\MaterialesRed;
use SeGuiMo\CRMBundle\Form\MaterialesRedType;

/**
 * MaterialesRed controller.
 *
 * @Route("/materialesred")
 */
class MaterialesRedController extends Controller
{

    /**
     * Lists all MaterialesRed entities.
     *
     * @Route("/", name="materialesred")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SeGuiMoCRMBundle:MaterialesRed')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MaterialesRed entity.
     *
     * @Route("/", name="materialesred_create")
     * @Method("POST")
     * @Template("SeGuiMoCRMBundle:MaterialesRed:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MaterialesRed();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('materialesred_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a MaterialesRed entity.
     *
     * @param MaterialesRed $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MaterialesRed $entity)
    {
        $form = $this->createForm(new MaterialesRedType(), $entity, array(
            'action' => $this->generateUrl('materialesred_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MaterialesRed entity.
     *
     * @Route("/new", name="materialesred_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MaterialesRed();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MaterialesRed entity.
     *
     * @Route("/{id}", name="materialesred_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:MaterialesRed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaterialesRed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MaterialesRed entity.
     *
     * @Route("/{id}/edit", name="materialesred_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:MaterialesRed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaterialesRed entity.');
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
    * Creates a form to edit a MaterialesRed entity.
    *
    * @param MaterialesRed $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MaterialesRed $entity)
    {
        $form = $this->createForm(new MaterialesRedType(), $entity, array(
            'action' => $this->generateUrl('materialesred_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MaterialesRed entity.
     *
     * @Route("/{id}", name="materialesred_update")
     * @Method("PUT")
     * @Template("SeGuiMoCRMBundle:MaterialesRed:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:MaterialesRed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaterialesRed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('materialesred_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MaterialesRed entity.
     *
     * @Route("/{id}", name="materialesred_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SeGuiMoCRMBundle:MaterialesRed')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MaterialesRed entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('materialesred'));
    }

    /**
     * Creates a form to delete a MaterialesRed entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materialesred_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
