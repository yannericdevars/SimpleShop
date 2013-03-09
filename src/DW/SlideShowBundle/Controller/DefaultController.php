<?php

namespace DW\SlideShowBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Yann-Eric Devars <yann-eric@live.fr>
 * @version 1.0
 */
class DefaultController extends Controller
{
    /**
     * Accueil de la boutique
     * @param string $ref Référence
     * @return template
     */
    public function boutiqueAction($ref)
    {
        
        $item = null;
        $images = null;
        
        $item = $this->getDoctrine()->getRepository('DWSlideShowBundle:Item')->findOneBy(array ('ref' => $ref));
        
        if (is_object($item))
          $images = $this->getDoctrine()->getRepository('DWSlideShowBundle:Image')->findBy(array ('item' => $item->getId()));
        
        $response = $this->render('DWSlideShowBundle:Default:index.html.twig', array('images' => $images, 'element' => $item));
        
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
