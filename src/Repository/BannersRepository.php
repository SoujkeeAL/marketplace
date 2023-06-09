<?php

namespace App\Repository;

use App\Entity\Banners;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Banners>
 *
 * @method Banners|null find($id, $lockMode = null, $lockVersion = null)
 * @method Banners|null findOneBy(array $criteria, array $orderBy = null)
 * @method Banners[]    findAll()
 * @method Banners[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BannersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Banners::class);
    }

    public function save(Banners $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Banners $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function selectAllBanners()
    {
        $banners = $this->createQueryBuilder('b')
            ->select('b.id, b.title, b.text, b.picture')
            ->orderBy('b.id')
            ->getQuery()
            ->getResult();
        return $banners;

    }
//    /**
//     * @return Banners[] Returns an array of Banners objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Banners
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
