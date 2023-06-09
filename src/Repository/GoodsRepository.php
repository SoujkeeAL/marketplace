<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Goods;
use App\Entity\Sales;
use App\Entity\Sellers;
use App\Entity\Technicals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Goods>
 *
 * @method Goods|null find($id, $lockMode = null, $lockVersion = null)
 * @method Goods|null findOneBy(array $criteria, array $orderBy = null)
 * @method Goods[]    findAll()
 * @method Goods[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoodsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Goods::class);
    }

    public function save(Goods $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Goods $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getOneGood($id)
    {
        $good = $this->createQueryBuilder('g')
//            ->select('g.id, g.uid, g.sales_id, g.category_id, g.seller_id')
            ->select('g, s, c')
            ->innerJoin(Sellers::class,'s','WITH', 'g.seller_id = s.id')
            ->innerJoin(Sales::class,'c','WITH','g.sales_id = c.id')
            ->where('g.id = :id' )
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();

        return $good;
    }

    public function getTopGoods()
    {
        $good = $this->createQueryBuilder('g')
            ->select('g.id, g.uid, g.category_id, g.SalesCount , z.final_price, z.prev_price , t.goodName , t.picture, c.name')
            ->join(Sales::class,'z','WITH','g.sales_id = z.id')
            ->join(Technicals::class,'t','WITH','g.uid = t.uid')
            ->join(Category::class,'c','WITH', 'g.category_id = c.id')
            ->orderBy('g.SalesCount','DESC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult();

        return $good;
    }

    public function getGoodsByFilters($filters)
    {
        $query = $this->createQueryBuilder('g')
            ->select('g.id, g.uid, g.category_id , s.company ,z.final_price, z.prev_price , t.goodName , t.picture, c.name')
            ->join(Sellers::class,'s','WITH', 'g.seller_id = s.id')
            ->join(Sales::class,'z','WITH','g.sales_id = z.id')
            ->join(Technicals::class,'t','WITH','g.uid = t.uid')
            ->join(Category::class,'c','WITH', 'g.category_id = c.id');
        if (array_key_exists('category',$filters)){
            $query
                ->andWhere('g.category_id = :id' )
                ->setParameter('id',$filters['category']);
        }
        if (array_key_exists('query',$filters)){
            $query
                ->andWhere('t.goodName LIKE :queryName')
                ->setParameter('queryName','%'. $filters['query'] . '%');
        }
        if (array_key_exists('sort',$filters)){
            if ($filters['sort'] == 'price_inc'){
                $query
                    ->orderBy('z.final_price','ASC');
            }
            if ($filters['sort'] == 'price_dec'){
                $query
                    ->orderBy('z.final_price','DESC');
            }
            if ($filters['sort'] == 'popular_inc'){
                $query
                    ->orderBy('g.SalesCount','ASC');
            }
            if ($filters['sort'] == 'popular_dec'){
                $query
                    ->orderBy('g.SalesCount','DESC');
            }
        }else {
            $query
                ->orderBy('z.final_price','DESC');
        }
        $goods = $query
            ->getQuery()
            ->getResult();

        return $goods;
    }

    public function getGoodsByCategory($id)
    {
        $goods = $this->createQueryBuilder('g')
            ->select('g.id, g.uid, g.category_id , s.company ,z.final_price, z.prev_price , t.goodName , t.picture, c.name')
            ->join(Sellers::class,'s','WITH', 'g.seller_id = s.id')
            ->join(Sales::class,'z','WITH','g.sales_id = z.id')
            ->join(Technicals::class,'t','WITH','g.uid = t.id')
            ->join(Category::class,'c','WITH', 'g.category_id = c.id')
            ->where('g.category_id = :id' )
            ->setParameter('id', $id)
            ->orderBy('g.id')
            ->getQuery()
            ->getResult();


        return $goods;
    }
}
