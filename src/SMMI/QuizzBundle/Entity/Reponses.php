<?php

namespace SMMI\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponses
 *
 * @ORM\Table(name="quizz_reponses")
 * @ORM\Entity(repositoryClass="SMMI\QuizzBundle\Repository\ReponsesRepository")
 */
class Reponses
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
     * @ORM\Column(name="reponses_ennonce", type="string", length=255)
     */
    private $reponsesEnnonce;

    /**
     * @ORM\Column(name="reponses_correct", type="boolean")
     */
    private $reponsesCorrect;

    /**
     * @ORM\ManyToOne(targetEntity="SMMI\QuizzBundle\Entity\Quizz", inversedBy="reponses")
     * ORM\JoinColumn(nullable=true, name="quizz_id", referencedColumnName="id")
     */
    private $quizz;

    /**
     * @ORM\ManyToOne(targetEntity="SMMI\QuizzBundle\Entity\Questions", inversedBy="reponses")
     * ORM\JoinColumn(nullable=true, name="questions_id", referencedColumnName="id")
     */
    private $questions;


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
     * Set reponsesEnnonce
     *
     * @param string $reponsesEnnonce
     * @return Reponses
     */
    public function setReponsesEnnonce($reponsesEnnonce)
    {
        $this->reponsesEnnonce = $reponsesEnnonce;
    
        return $this;
    }

    /**
     * Get reponsesEnnonce
     *
     * @return string 
     */
    public function getReponsesEnnonce()
    {
        return $this->reponsesEnnonce;
    }

    /**
     * Set quizz
     *
     * @param \SMMI\QuizzBundle\Entity\Quizz $quizz
     * @return Reponses
     */
    public function setQuizz(\SMMI\QuizzBundle\Entity\Quizz $quizz = null)
    {
        $this->quizz = $quizz;
    
        return $this;
    }

    /**
     * Get quizz
     *
     * @return \SMMI\QuizzBundle\Entity\Quizz 
     */
    public function getQuizz()
    {
        return $this->quizz;
    }

    /**
     * Set questions
     *
     * @param \SMMI\QuizzBundle\Entity\Questions $questions
     * @return Reponses
     */
    public function setQuestions(\SMMI\QuizzBundle\Entity\Questions $questions = null)
    {
        $this->questions = $questions;
    
        return $this;
    }

    /**
     * Get questions
     *
     * @return \SMMI\QuizzBundle\Entity\Questions 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set reponsesCorrect
     *
     * @param boolean $reponsesCorrect
     * @return Reponses
     */
    public function setReponsesCorrect($reponsesCorrect)
    {
        $this->reponsesCorrect = $reponsesCorrect;
    
        return $this;
    }

    /**
     * Get reponsesCorrect
     *
     * @return boolean 
     */
    public function getReponsesCorrect()
    {
        return $this->reponsesCorrect;
    }

    public function __toString()
    {
        return $this->getQuestions();
        return $this->getQuizz();
    }

}
