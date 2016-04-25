<?php

namespace SMMI\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quizz
 *
 * @ORM\Table(name="quizz")
 * @ORM\Entity(repositoryClass="SMMI\QuizzBundle\Repository\QuizzRepository")
 */
class Quizz
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="quizz_nom", type="string", length=255)
     */
    private $quizzNom;

    /**
     * @ORM\OneToMany(targetEntity="SMMI\QuizzBundle\Entity\Questions", mappedBy="quizz", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity="SMMI\QuizzBundle\Entity\Reponses", mappedBy="quizz", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $reponses;


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
     * Set quizzNom
     *
     * @param string $quizzNom
     * @return Quizz
     */
    public function setQuizzNom($quizzNom)
    {
        $this->quizzNom = $quizzNom;
    
        return $this;
    }

    /**
     * Get quizzNom
     *
     * @return string 
     */
    public function getQuizzNom()
    {
        return $this->quizzNom;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questions
     *
     * @param \SMMI\QuizzBundle\Entity\Questions $questions
     * @return Quizz
     */
    public function addQuestion(\SMMI\QuizzBundle\Entity\Questions $questions)
    {
        $this->questions[] = $questions;
    
        return $this;
    }

    /**
     * Remove questions
     *
     * @param \SMMI\QuizzBundle\Entity\Questions $questions
     */
    public function removeQuestion(\SMMI\QuizzBundle\Entity\Questions $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add reponses
     *
     * @param \SMMI\QuizzBundle\Entity\Reponses $reponses
     * @return Quizz
     */
    public function addReponse(\SMMI\QuizzBundle\Entity\Reponses $reponses)
    {
        $this->reponses[] = $reponses;
    
        return $this;
    }

    /**
     * Remove reponses
     *
     * @param \SMMI\QuizzBundle\Entity\Reponses $reponses
     */
    public function removeReponse(\SMMI\QuizzBundle\Entity\Reponses $reponses)
    {
        $this->reponses->removeElement($reponses);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponses()
    {
        return $this->reponses;
    }
}
