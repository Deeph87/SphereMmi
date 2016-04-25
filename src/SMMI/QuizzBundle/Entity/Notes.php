<?php

namespace SMMI\QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 *
 * @ORM\Table(name="notes")
 * @ORM\Entity(repositoryClass="SMMI\QuizzBundle\Repository\NotesRepository")
 */
class Notes
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
     * @var int
     *
     * @ORM\Column(name="quizzNotes", type="integer")
     */
    private $quizzNotes;


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
     * Set quizzNotes
     *
     * @param integer $quizzNotes
     * @return Notes
     */
    public function setQuizzNotes($quizzNotes)
    {
        $this->quizzNotes = $quizzNotes;
    
        return $this;
    }

    /**
     * Get quizzNotes
     *
     * @return integer 
     */
    public function getQuizzNotes()
    {
        return $this->quizzNotes;
    }
}
