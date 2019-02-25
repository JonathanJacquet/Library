<?php

namespace App\Repository;

use App\Entity\Administrator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Administrator|null find($id, $lockMode = null, $lockVersion = null)
 * @method Administrator|null findOneBy(array $criteria, array $orderBy = null)
 * @method Administrator[]    findAll()
 * @method Administrator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */


    class AdministratorRepository extends ServiceEntityRepository
    {
        public function __construct(RegistryInterface $registry)
        {
            parent::__construct($registry, Administrator::class);
        }

         /**
          * @return Administrator[] Returns an array of Administrator objects
          */
        public function findByAdministratorID($value)
        {
            return $this->createQueryBuilder('u')
                ->andWhere('u.id = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getResult()
            ;
        }
        // public function AdministratorLinkBook($Administrator) {
        //   return $this->createQueryBuilder("u")
        //     ->Join("u.cardNumber", "b")
        //     ->Where("u.cardNumber IN (:Administrator)")
        //     ->setParameter("Administrator", $Administrator)
        //     ->getResult()
        // }

        // /**
        //  * @return Administrator[] Returns an array of Administrator objects
        //  */
        /*
        public function findByExampleField($value)
        {
            return $this->createQueryBuilder('u')
                ->andWhere('u.exampleField = :val')
                ->setParameter('val', $value)
                ->orderBy('u.id', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
        }
        */

        /*
        public function findOneBySomeField($value): ?Administrator
        {
            return $this->createQueryBuilder('u')
                ->andWhere('u.exampleField = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }
        */
    }
