<?php

namespace GameInLyonBundle\Repository;


use LaFolleAgenceBundle\Entity\Category;

class ActivitiesRepository extends \Doctrine\ORM\EntityRepository
{
    public function getReligious() {
        $query = $this->createQueryBuilder('a')
            ->where('a.category = :category')
            ->setParameter('category', 'PATRIMOINE_CULTUREL')
            ->andWhere('a.name LIKE ?2')
            ->setParameter(2, 'Eglise%')
            ->andWhere('a.postcode LIKE ?3')
            ->setParameter(3, '69002')
            ->setMaxResults(5)
            ->getQuery();

        return $query->getResult();
    }

    public function getGourmet() {
        $query = $this->createQueryBuilder('a')
            ->where('a.category = :category')
            ->setParameter('category', 'RESTAURATION')
            ->andWhere('a.postcode = 69003')
            ->setMaxResults(5)
            ->getQuery();

        return $query->getResult();
    }


    public function getCulturel() {
        $query = $this->createQueryBuilder('a')
            ->where('a.category = :category')
            ->setParameter('category', 'PATRIMOINE_CULTUREL')
            ->andWhere('a.name LIKE ?2')
            ->setParameter(2, 'Musée%')
            ->andWhere('a.postcode LIKE ?3')
            ->setParameter(3, '69002')
            ->setMaxResults(5)
            ->getQuery();

        return $query->getResult();
    }


    public function getBalade() {
        $query = $this->createQueryBuilder('a')
            ->where('a.category = :category')
            ->setParameter('category', 'PATRIMOINE_CULTUREL')
            ->andWhere('a.name LIKE ?2')
            ->setParameter(2, 'Parc%')
            ->andWhere('a.postcode LIKE ?3')
            ->setParameter(3, '69003')
            ->setMaxResults(5)
            ->getQuery();

        return $query->getResult();
    }

    public function getRandom() {

        $results = $this->createQueryBuilder('a')
            ->where('a.category LIKE ?1')
            ->setParameter(1, 'PATRIMOINE_CULTUREL%')
            ->orWhere('a.category LIKE ?2')
            ->setParameter(2, 'RESTAURATION%')
            //->orderBy('a.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
        shuffle($results);
        return $results;
    }

}
