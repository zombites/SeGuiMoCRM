<?php

namespace SeGuiMo\CRMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SeGuiMo\CRMBundle\Entity\Documentos;
use SeGuiMo\CRMBundle\Form\DocumentosType;


/**
 * Documentos controller.
 *
 * @Route("/documentos")
 */
class DocumentosController extends Controller
{

    /**
     * Lists all Documentos entities.
     *
     * @Route("/", name="documentos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SeGuiMoCRMBundle:Documentos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Documentos entity.
     *
     * @Route("/", name="documentos_create")
     * @Method("POST")
     * @Template("SeGuiMoCRMBundle:Documentos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Documentos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
        	$ficherosDir = $this->container->getParameter('kernel.root_dir').'/../web/bundles/seguimocrm/uploads';
			$nombreFichero = $entity->getNombre()->getClientOriginalName();
			
			$nombre = date('YmdHis') . " " . $nombreFichero;


			$entity->setMimetype($entity->getNombre()->getMimetype());
			$entity->setSize($entity->getNombre()->getSize());
			
            // Move the file to the directory where brochures are stored
            $entity->getNombre()->move($ficherosDir, $nombre);
			
			$entity->setNombre($nombreFichero);
			$entity->setRuta($nombre);
			

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('documentos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Documentos entity.
     *
     * @param Documentos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Documentos $entity)
    {
        $form = $this->createForm(new DocumentosType(), $entity, array(
            'action' => $this->generateUrl('documentos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Documentos entity.
     *
     * @Route("/new", name="documentos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Documentos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Documentos entity.
     *
     * @Route("/{id}", name="documentos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:Documentos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documentos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Documentos entity.
     *
     * @Route("/{id}/edit", name="documentos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:Documentos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documentos entity.');
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
    * Creates a form to edit a Documentos entity.
    *
    * @param Documentos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Documentos $entity)
    {
        $form = $this->createForm(new DocumentosType(), $entity, array(
            'action' => $this->generateUrl('documentos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Documentos entity.
     *
     * @Route("/{id}", name="documentos_update")
     * @Method("PUT")
     * @Template("SeGuiMoCRMBundle:Documentos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeGuiMoCRMBundle:Documentos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documentos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
        	if($entity->getNombre()){
				$ficherosDir = $this->container->getParameter('kernel.root_dir').'/../web/bundles/seguimocrm/uploads';
				$nombreFichero = $entity->getNombre()->getClientOriginalName();
			
				$nombre = date('YmdHis') . " " . $nombreFichero;


				$entity->setMimetype($entity->getNombre()->getMimetype());
				$entity->setSize($entity->getNombre()->getSize());
			
            	// Move the file to the directory where brochures are stored
            	$entity->getNombre()->move($ficherosDir, $nombre);
			
				$entity->setNombre($nombreFichero);
				$entity->setRuta($nombre);
			}
			
            $em->flush();

            return $this->redirect($this->generateUrl('documentos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Documentos entity.
     *
     * @Route("/{id}", name="documentos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SeGuiMoCRMBundle:Documentos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Documentos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('documentos'));
    }

    /**
     * Creates a form to delete a Documentos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
