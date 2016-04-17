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
     * @var int
     *
     * @ORM\Column(name="quizz_note", type="integer")
     */
    private $quizzNote;


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
     * Set quizzNote
     *
     * @param integer $quizzNote
     * @return Quizz
     */
    public function setQuizzNote($quizzNote)
    {
        $this->quizzNote = $quizzNote;

        return $this;
    }

    /**
     * Get quizzNote
     *
     * @return integer 
     */
    public function getQuizzNote()
    {
        return $this->quizzNote;
    }
}
