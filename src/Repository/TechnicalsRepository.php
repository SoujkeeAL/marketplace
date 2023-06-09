<?php

namespace App\Repository;

use App\Entity\Technicals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Technicals>
 *
 * @method Technicals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Technicals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Technicals[]    findAll()
 * @method Technicals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnicalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Technicals::class);
    }

    public function save(Technicals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Technicals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getTechnicalsForGood($uid)
    {
        $technicals = $this->createQueryBuilder('t')
            ->select('t.uid, t.goodName, t.description, t.picture')
            ->where('t.uid =' . $uid)
            ->getQuery()
            ->getResult();

        return $technicals;
    }

    public function getTechnicalsForAllGoods()
    {
        $technicals = $this->createQueryBuilder('t')
            ->select('t.id, t.uid, t.name, t.description, t.picture , t.specs')
            ->orderBy('t.uid')
            ->getQuery()
            ->getResult();

        return $technicals;
    }
//    /**
//     * @return Technicals[] Returns an array of Technicals objects
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

//    public function findOneBySomeField($value): ?Technicals
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
