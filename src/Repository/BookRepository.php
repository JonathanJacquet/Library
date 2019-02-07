<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @return Book[] Returns an array of Book objects
     */
    public function findByIdJoinCategory($value)
    {
        return $this->createQueryBuilder('b')
            ->leftJoin('b.category', 'c')
            ->addSelect('c')
            ->andWhere('b.id = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Book[] Returns an array of Book objects
     */
    public function findByAll($value) {
        return $this->createQueryBuilder('b')
            ->andWhere('b.author = :val', 'b.datePublication = :val', 'b.title = :val', 'b.category = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult()
          ;
    }

    /**
     * @return Book[] Returns an array of Book objects
     */
    public function findByUser($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.borrower = :val')
            ->setParameter('val', $value)
            ->orderBy('b.title', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Book[] Returns an array of Book objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
