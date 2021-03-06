<?php

namespace App\Repository;

use App\Entity\Tools;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tools|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tools|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tools[]    findAll()
 * @method Tools[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToolsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tools::class);
    }

     /**
      * @return Tools[] Returns an array of Tools objects
      */

    /*public function findByUser($value)
    {
        return $this->createQueryBuilder('t')
            ->select(['id', 'name', 'description'])
            ->from('tools','t')
            ->andWhere('t.relation = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }*/


    /*
    public function findOneBySomeField($value): ?Tools
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
