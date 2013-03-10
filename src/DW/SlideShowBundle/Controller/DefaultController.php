<?php

namespace DW\SlideShowBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \DW\CommentsBundle\Entity\Response;
use DW\CommentsBundle\Entity\Subject;

/**
 * @author Yann-Eric Devars <yann-eric@live.fr>
 * @version 1.0
 */
class DefaultController extends Controller
{
    /**
     * Accueil de la boutique
     * Ajout de la partie commentaires
     * @param string $ref Référence
     * @return template
     */
    public function boutiqueAction(Request $request, $ref)
    {
        
        $item = null;
        $images = null;
        if (is_numeric($request->get('ref')) && is_string($request->get('comments')))
        {
            $ref = $request->get('ref');
            $comment = $request->get('comments');
            
            $reponse = new Response();
            $subject = $this->getDoctrine()->getRepository('DWCommentsBundle:Subject')->findOneBy(array ('text' => $ref));
            $reponse->setIsActive(false);
            $reponse->setDateCreate(new \DateTime());
            $reponse->setSubject($subject);
            $reponse->setText($comment);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($reponse);
            $em->flush();
            
        }
        $item = $this->getDoctrine()->getRepository('DWSlideShowBundle:Item')->findOneBy(array ('ref' => $ref));
        
        /******************************************
                  Partie des commentaires  
        /******************************************/
        $subject = $this->getDoctrine()->getRepository('DWCommentsBundle:Subject')->findOneBy(array('text' => $ref));
        $comments = null;
        if (is_object($subject))
        {
            $subject_id = $subject->getId();
            $conditions = array(
                'subject_id'    => $subject_id,
                'isActive'      => true
                );        
            $comments = $this->getDoctrine()->getRepository('DWCommentsBundle:Response')->findBy($conditions);
        }
        
        /******************************************
                  Fin partie des commentaires  
        /******************************************/
        
        if (is_object($item))
        {
            $images = $this->getDoctrine()->getRepository('DWSlideShowBundle:Image')->findBy(array ('item' => $item->getId()));
        }
          
        
        $response = $this->render('DWSlideShowBundle:Default:index.html.twig', array('images' => $images, 'element' => $item, 'comments' => $comments));
        
        $as_parameter = $this->container->hasParameter('cache_home_page');
        $cache_home_page = 3600;
        if ($as_parameter)
        {
            if (is_numeric($this->container->getParameter('cache_home_page')))
            $cache_home_page = $this->container->getParameter('cache_home_page');
        }
        $response->setSharedMaxAge($cache_home_page);
        
        return $response;
    }
    


}
