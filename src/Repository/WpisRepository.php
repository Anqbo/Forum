<?php

namespace App\Repository;

use App\Entity\Wpis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Wpis>
 *
 * @method Wpis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wpis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wpis[]    findAll()
 * @method Wpis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WpisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wpis::class);
    }
    public function remove(Wpis $wpis, bool $flush = true){
        $this->getEntityManager()->remove($wpis);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getLastPost(): ?Wpis
    {
        $queryBuilder = $this->createQueryBuilder('w');
        $queryBuilder->orderBy('w.dateAdded', 'DESC');
        $queryBuilder->setMaxResults(1);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    public function getPostsByTitle(string $text)
    {
        $queryBuilder = $this->createQueryBuilder('w');
        $queryBuilder->where(
            $queryBuilder->expr()->like('w.title', ':text')
        );
        $queryBuilder->setParameter('text','%'.$text.'%');
        $queryBuilder->orderBy('w.dateAdded', 'DESC');
        $queryBuilder->setMaxResults(10);

        return $queryBuilder->getQuery()->getResult();
    }

//    /**
//     * @return Wpis[] Returns an array of Wpis objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Wpis
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
