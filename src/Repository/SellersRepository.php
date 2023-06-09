<?php

namespace App\Repository;

use App\Entity\Sales;
use App\Entity\Sellers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sellers>
 *
 * @method Sellers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sellers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sellers[]    findAll()
 * @method Sellers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SellersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sellers::class);
    }

    public function save(Sellers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Sellers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getSellersForGood()
    {
        $sellers = $this->createQueryBuilder('s')
            ->select('s.id, s.company, s.telephone, s.contact')
            ->orderBy('s.id')
            ->getQuery()
            ->getResult();

        return $sellers;
    }
//    /**
//     * @return Sellers[] Returns an array of Sellers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Sellers
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
