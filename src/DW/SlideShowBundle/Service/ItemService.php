<?php
/**
 * @author Yann-Eric <yann-eric@live.fr>
 */
namespace DW\SlideShowBundle\Service;
use Doctrine\ORM\EntityManager;

class ItemService {

public function getItems($controler)
    {
        return $controler->getDoctrine()->getRepository('DWSlideShowBundle:Item')->findAll();
    }

}
