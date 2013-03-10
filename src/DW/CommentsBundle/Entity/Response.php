<?php

namespace DW\CommentsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * DW\CommentsBundle\Entity\Response
 *
 * @ORM\Table(name="dw_response")
 * @ORM\Entity(repositoryClass="DW\CommentsBundle\Entity\ResponseRepository")
 */
class Response
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $text
     *
     * @ORM\Column(name="text", type="string", length=2000)
     */
    private $text;

    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var \DateTime $date_create
     *
     * @ORM\Column(name="date_create", type="datetime")
     */
    private $date_create;
    
     /**
     * @var integer $subject_id
     *
     * @ORM\Column(name="subject_id", type="integer")
     */
    private $subject_id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Response
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Response
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set date_create
     *
     * @param \DateTime $dateCreate
     * @return Response
     */
    public function setDateCreate($dateCreate)
    {
        $this->date_create = $dateCreate;
    
        return $this;
    }

    /**
     * Get date_create
     *
     * @return \DateTime 
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }
    
    /**
     * @ManyToOne(targetEntity="Subject")
     * @JoinColumn(name="subject_id", referencedColumnName="id")
     */
    private $subject;

    /**
     * Get subject
     *
     */
    public function getSubject()
    {
        return $this->subject;
    }
    
    /**
     * Set subject
     *
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
    
}
