<?php

namespace SeGuiMo\CRMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SeGuiMo\CRMBundle\Entity\PersonasHasNodos;
use SeGuiMo\CRMBundle\Form\PersonasHasNodosType;

/**
 * PersonasHasNodos controller.
 *
 * @Route("/personashasnodos")
 */
class PersonasHasNodosController extends Controller
{

    /**
     * Lists all PersonasHasNodos entities.
     *
     * @Route("/", name="personashasnodos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SeGuiMoCRMBundle:PersonasHasNodos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PersonasHasNodos entity.
     *
     * @Route("/", name="personashasnodos_create")
     * @Method("POST")
     * @Template("SeGuiMoCRMBundle:PersonasHasNodos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PersonasHasNodos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personashasnodos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a PersonasHasNodos entity.
     *
     * @param PersonasHasNodos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PersonasHasNodos $entity)
    {
        $form = $this->createForm(new PersonasHasNodosType(), $entity, array(
            'action' => $this->generateUrl('personashasnodos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PersonasHasNodos entity.
     *
     * @Route("/new", name="personashasnodos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PersonasHasNodos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PersonasHasNodos entity.
     *
     * @Route("/{id}", name="personashasnodos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:PersonasHasNodos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonasHasNodos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PersonasHasNodos entity.
     *
     * @Route("/{id}/edit", name="personashasnodos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:PersonasHasNodos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonasHasNodos entity.');
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
    * Creates a form to edit a PersonasHasNodos entity.
    *
    * @param PersonasHasNodos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PersonasHasNodos $entity)
    {
        $form = $this->createForm(new PersonasHasNodosType(), $entity, array(
            'action' => $this->generateUrl('personashasnodos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PersonasHasNodos entity.
     *
     * @Route("/{id}", name="personashasnodos_update")
     * @Method("PUT")
     * @Template("SeGuiMoCRMBundle:PersonasHasNodos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:PersonasHasNodos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersonasHasNodos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('personashasnodos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PersonasHasNodos entity.
     *
     * @Route("/{id}", name="personashasnodos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SeGuiMoCRMBundle:PersonasHasNodos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PersonasHasNodos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personashasnodos'));
    }

    /**
     * Creates a form to delete a PersonasHasNodos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personashasnodos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
