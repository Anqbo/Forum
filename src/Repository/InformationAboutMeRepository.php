<?php

namespace App\Repository;

use App\Entity\InformationAboutMe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InformationAboutMe>
 *
 * @method InformationAboutMe|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationAboutMe|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationAboutMe[]    findAll()
 * @method InformationAboutMe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationAboutMeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationAboutMe::class);
    }

    //    /**
    //     * @return InformationAboutMe[] Returns an array of InformationAboutMe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?InformationAboutMe
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
