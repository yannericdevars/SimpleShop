<?php

namespace DW\CommentsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DW\CommentsBundle\Entity\Subject;
use DW\CommentsBundle\Form\SubjectType;

/**
 * Subject controller.
 *
 */
class SubjectController extends Controller
{
    /**
     * Lists all Subject entities.
     *
     */
    public function indexAction()
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DWCommentsBundle:Subject')->findAll();

        return $this->render('DWCommentsBundle:Subject:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Subject entity.
     *
     */
    public function showAction($id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DWCommentsBundle:Subject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DWCommentsBundle:Subject:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Subject entity.
     *
     */
    public function newAction()
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $entity = new Subject();
        $form   = $this->createForm(new SubjectType(), $entity);

        return $this->render('DWCommentsBundle:Subject:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Subject entity.
     *
     */
    public function createAction(Request $request)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $entity  = new Subject();
        $form = $this->createForm(new SubjectType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subject_show', array('id' => $entity->getId())));
        }

        return $this->render('DWCommentsBundle:Subject:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Subject entity.
     *
     */
    public function editAction($id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DWCommentsBundle:Subject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }

        $editForm = $this->createForm(new SubjectType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DWCommentsBundle:Subject:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Subject entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DWCommentsBundle:Subject')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Subject entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SubjectType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('subject_edit', array('id' => $id)));
        }

        return $this->render('DWCommentsBundle:Subject:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Subject entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DWCommentsBundle:Subject')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Subject entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('subject'));
    }

    private function createDeleteForm($id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
