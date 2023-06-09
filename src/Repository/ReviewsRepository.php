<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Goods;
use App\Entity\Reviews;
use App\Entity\Sales;
use App\Entity\Sellers;
use App\Entity\Technicals;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reviews>
 *
 * @method Reviews|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reviews|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reviews[]    findAll()
 * @method Reviews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reviews::class);
    }

    public function save(Reviews $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Reviews $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getAllReviewsById($id)
    {
        $good = $this->createQueryBuilder('r')
            ->select('r.id, r.user_id, r.good_id , r.CreatedAt ,r.is_active, r.text , u.firstName, u.lastName, g.id ')
            ->innerJoin(User::class,'u','WITH', 'r.user_id = u.id')
            ->innerJoin(Goods::class,'g','WITH','r.good_id = g.id')
            ->where('r.good_id =' . $id )
            ->andWhere('r.is_active = 1')
            ->orderBy('r.id')
            ->getQuery()
            ->getResult();

        return $good;
    }


//    /**
//     * @return Reviews[] Returns an array of Reviews objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reviews
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
