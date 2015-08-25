<?php

namespace SeGuiMo\CRMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SeGuiMo\CRMBundle\Entity\Personas;
use SeGuiMo\CRMBundle\Form\PersonasType;

/**
 * Personas controller.
 *
 * @Route("/personas")
 */
class PersonasController extends Controller
{

    /**
     * Lists all Personas entities.
     *
     * @Route("/", name="personas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SeGuiMoCRMBundle:Personas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Personas entity.
     *
     * @Route("/", name="personas_create")
     * @Method("POST")
     * @Template("SeGuiMoCRMBundle:Personas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Personas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Personas entity.
     *
     * @param Personas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Personas $entity)
    {
        $form = $this->createForm(new PersonasType(), $entity, array(
            'action' => $this->generateUrl('personas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Personas entity.
     *
     * @Route("/new", name="personas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Personas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Personas entity.
     *
     * @Route("/{id}", name="personas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:Personas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Personas entity.
     *
     * @Route("/{id}/edit", name="personas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:Personas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personas entity.');
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
    * Creates a form to edit a Personas entity.
    *
    * @param Personas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Personas $entity)
    {
        $form = $this->createForm(new PersonasType(), $entity, array(
            'action' => $this->generateUrl('personas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Personas entity.
     *
     * @Route("/{id}", name="personas_update")
     * @Method("PUT")
     * @Template("SeGuiMoCRMBundle:Personas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:Personas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('personas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Personas entity.
     *
     * @Route("/{id}", name="personas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SeGuiMoCRMBundle:Personas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personas'));
    }

    /**
     * Creates a form to delete a Personas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
