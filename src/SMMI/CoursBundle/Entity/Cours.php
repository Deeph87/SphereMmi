<?php

namespace SMMI\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="SMMI\CoursBundle\Repository\CoursRepository")
 */
class Cours
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="module", type="string", length=100)
     */
    private $module;

    /**
     * @var string
     *
     * @ORM\Column(name="promo", type="string", length=5)
     */
    private $promo;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=60)
     */
    private $auteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetimetz")
     */
    private $date;

    /**
     * @ORM\Column(name="online", type="boolean")
     */
    private $online = true;

    /**
     * @ORM\OneToMany(targetEntity="SMMI\CoursBundle\Entity\Chapitre", mappedBy="cours", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitres;
   
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
     * Set titre
     *
     * @param string $titre
     * @return Cours
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Cours
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Cours
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set online
     *
     * @param boolean $online
     * @return Cours
     */
    public function setOnline($online)
    {
        $this->online = $online;
    
        return $this;
    }

    /**
     * Get online
     *
     * @return boolean 
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \Datetime();
        $this->chapitres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add chapitres
     *
     * @param \SMMI\CoursBundle\Entity\Chapitre $chapitres
     * @return Cours
     */
    public function addChapitre(\SMMI\CoursBundle\Entity\Chapitre $chapitres)
    {
        $this->chapitres[] = $chapitres;

        $chapitres->setCours($this);
    
        return $this;
    }

    /**
     * Remove chapitres
     *
     * @param \SMMI\CoursBundle\Entity\Chapitre $chapitres
     */
    public function removeChapitre(\SMMI\CoursBundle\Entity\Chapitre $chapitres)
    {
        $this->chapitres->removeElement($chapitres);
    }

    /**
     * Get chapitres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChapitres()
    {
        return $this->chapitres;
    }

    /**
     * Set module
     *
     * @param string $module
     * @return Cours
     */
    public function setModule($module)
    {
        $this->module = $module;
    
        return $this;
    }

    /**
     * Get module
     *
     * @return string 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set promo
     *
     * @param string $promo
     * @return Cours
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;
    
        return $this;
    }

    /**
     * Get promo
     *
     * @return string 
     */
    public function getPromo()
    {
        return $this->promo;
    }
}
