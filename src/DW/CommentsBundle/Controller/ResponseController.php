<?php

namespace DW\CommentsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DW\CommentsBundle\Entity\Response;
use DW\CommentsBundle\Form\ResponseType;

/**
 * Response controller.
 *
 */
class ResponseController extends Controller
{
    /**
     * Lists all Response entities.
     *
     */
    public function indexAction()
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DWCommentsBundle:Response')->findAll();

        return $this->render('DWCommentsBundle:Response:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Response entity.
     *
     */
    public function showAction($id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DWCommentsBundle:Response')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Response entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DWCommentsBundle:Response:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Response entity.
     *
     */
    public function newAction()
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $entity = new Response();
        $form   = $this->createForm(new ResponseType(), $entity);

        return $this->render('DWCommentsBundle:Response:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Response entity.
     *
     */
    public function createAction(Request $request)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN')); 
        
        $entity  = new Response();
        $form = $this->createForm(new ResponseType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('response_show', array('id' => $entity->getId())));
        }

        return $this->render('DWCommentsBundle:Response:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Response entity.
     *
     */
    public function editAction($id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DWCommentsBundle:Response')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Response entity.');
        }

        $editForm = $this->createForm(new ResponseType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DWCommentsBundle:Response:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Response entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DWCommentsBundle:Response')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Response entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ResponseType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('response_edit', array('id' => $id)));
        }

        return $this->render('DWCommentsBundle:Response:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Response entity.
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
            $entity = $em->getRepository('DWCommentsBundle:Response')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Response entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('response'));
    }
    
    public function listAction(Request $request, $id)
    {
        $userService = $this->get("userService");
        $userService->verify($this->getRequest()->getSession()->get('userAutentif'), array('ADMIN'));
        
        $action_todo = $request->get('publish');
        $id_todo = $request->get('id');
        
        $em = $this->getDoctrine()->getManager();
        
        if ($id_todo != null)
        {
            $element_to_modify = $em->getRepository('DWCommentsBundle:Response')->findOneBy(array('id' => $id_todo));
            if (is_object($element_to_modify))
            {
                if ($action_todo == 'delete')
                {
                    $em->remove($element_to_modify);
                }
                else 
                {
                    if ($action_todo == 'no_pub')
                    {
                        $element_to_modify->setIsActive(false);
                    }
                    else if ($action_todo == 'pub')
                    {
                        $element_to_modify->setIsActive(true);
                    }
                    $em->persist($element_to_modify);
                    
                }
                
                $em->flush();
              
            }
            
        }
        
        $entities = $em->getRepository('DWCommentsBundle:Response')->findBy(array('subject_id' => $id));
        $subject = $em->getRepository('DWCommentsBundle:Subject')->findOneBy(array('id' => $id));
        
        return $this->render('DWCommentsBundle:Response:list.html.twig', array(
            'entities' => $entities, 'subject' => $subject
        ));
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
