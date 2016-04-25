<?php

namespace SMMI\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="quizz_questions")
 * @ORM\Entity(repositoryClass="SMMI\QuizzBundle\Repository\QuestionsRepository")
 */
class Questions
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
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="SMMI\QuizzBundle\Entity\Quizz", inversedBy="questions")
     * ORM\JoinColumn(nullable=true, name="quizz_id", referencedColumnName="id")
     */
    private $quizz;

    /**
     * @ORM\OneToMany(targetEntity="SMMI\QuizzBundle\Entity\Reponses", mappedBy="questions", cascade={"persist", "remove"})
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
     * Set question
     *
     * @param string $question
     * @return Questions
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set quizz
     *
     * @param \SMMI\QuizzBundle\Entity\Quizz $quizz
     * @return Questions
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
     * Add reponses
     *
     * @param \SMMI\QuizzBundle\Entity\Reponses $reponses
     * @return Questions
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
