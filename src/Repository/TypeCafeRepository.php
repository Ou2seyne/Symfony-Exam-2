<?php

namespace App\Repository;

use App\Entity\TypeCafe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeCafe>
 *
 * @method TypeCafe|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeCafe|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeCafe[]    findAll()
 * @method TypeCafe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeCafeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeCafe::class);
    }

//    /**
//     * @return TypeCafe[] Returns an array of TypeCafe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeCafe
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
