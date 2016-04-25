<?php

namespace SMMI\CoursBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ListeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CoursRepository extends EntityRepository
{
    public function getCoursWithChapitre()
    {
        $qb = $this
            ->createQueryBuilder('c')
            ->leftJoin('c.chapitres', 'chap')
            ->addSelect('chap')
        ;

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
}
