<?php

namespace DW\CommentsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DW\CommentsBundle\Entity\Subject
 *
 * @ORM\Table(name="dw_subject")
 * @ORM\Entity(repositoryClass="DW\CommentsBundle\Entity\SubjectRepository")
 */
class Subject
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
     * @ORM\Column(name="text", type="string", length=1000)
     */
    private $text;

    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var \DateTime $date_publish
     *
     * @ORM\Column(name="date_publish", type="datetime")
     */
    private $date_publish;

    /**
     * @var \DateTime $date_depublish
     *
     * @ORM\Column(name="date_depublish", type="datetime")
     */
    private $date_depublish;


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
     * @return Subject
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
     * @return Subject
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
     * Set date_publish
     *
     * @param \DateTime $datePublish
     * @return Subject
     */
    public function setDatePublish($datePublish)
    {
        $this->date_publish = $datePublish;
    
        return $this;
    }

    /**
     * Get date_publish
     *
     * @return \DateTime 
     */
    public function getDatePublish()
    {
        return $this->date_publish;
    }

    /**
     * Set date_depublish
     *
     * @param \DateTime $dateDepublish
     * @return Subject
     */
    public function setDateDepublish($dateDepublish)
    {
        $this->date_depublish = $dateDepublish;
    
        return $this;
    }

    /**
     * Get date_depublish
     *
     * @return \DateTime 
     */
    public function getDateDepublish()
    {
        return $this->date_depublish;
    }
    
    public function __toString() {
        return $this->getText();
    }
}
