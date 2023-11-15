<?php

namespace App\Repository;

use App\Entity\OldBadge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OldBadge>
 *
 * @method OldBadge|null find($id, $lockMode = null, $lockVersion = null)
 * @method OldBadge|null findOneBy(array $criteria, array $orderBy = null)
 * @method OldBadge[]    findAll()
 * @method OldBadge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OldBadgeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OldBadge::class);
    }

//    /**
//     * @return OldBadge[] Returns an array of OldBadge objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OldBadge
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
