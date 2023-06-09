<?php

namespace App\Controller;

use App\Entity\Goods;
use App\Entity\Reviews;
use App\Form\AddReviewForProductFormType;
use App\Form\CatalogFilteringFormType;
use App\Form\SearchGoodsFormType;
use App\Repository\BannersRepository;
use App\Repository\CategoryRepository;
use App\Repository\GoodsRepository;
use App\Repository\ReviewsRepository;
use App\Repository\TechnicalsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MeganoController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(
        CategoryRepository $categoryRepository,
        BannersRepository  $bannersRepository,
        GoodsRepository    $goodsRepository
    ): Response
    {
        $topGoods = $goodsRepository->getTopGoods();
        $menu = $categoryRepository->selectAllByName();
        $banner = $bannersRepository->selectAllBanners();
        return $this->render('pages/main.html.twig', [
            'controller_name' => 'MeganoController',
            'menu' => $menu,
            'banner' => $banner,
            'topGoods' => $topGoods
        ]);
    }


    #[Route('/product/{id}', name: 'app_product')]
    public function product($id,
                            CategoryRepository $categoryRepository,
                            GoodsRepository $goodsRepository,
                            TechnicalsRepository $technicalsRepository,
                            ReviewsRepository $reviewsRepository,
                            Request $request,
                            EntityManagerInterface $em
    ): Response
    {
        $goods = $goodsRepository->getOneGood($id);
        $technicals = $technicalsRepository->getTechnicalsForGood($id);
        $reviews = $reviewsRepository->getAllReviewsById($id);
        $menu = $categoryRepository->selectAllByName();

        $review = new Reviews();
        $form = $this->createForm(AddReviewForProductFormType::class, $review);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $review->setGoodId($id);
            $review->setIsActive(1);
            $review->setUserId($this->getUser()->getId());
            $review->setCreatedAt(new \DateTime());
            $em->persist($review);
            $em->flush();
        }


        return $this->render('pages/product.html.twig', [
            'menu' => $menu,
            'goods' => $goods[0],
            'seller' => $goods[1],
            'sales' => $goods[2],
            'technicals' => $technicals,
            'reviews' => $reviews,
            'addReviewForProductForm' => $form->createView()
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        return $this->render('pages/about.html.twig', [
            'menu' => $menu
        ]);
    }

    #[Route('/compare', name: 'app_compare')]
    public function compare(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        return $this->render('pages/compare.html.twig', [
            'menu' => $menu
        ]);
    }

    #[Route('/contacts', name: 'app_contacts')]
    public function contacts(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        return $this->render('pages/contacts.html.twig', [
            'menu' => $menu
        ]);
    }

    #[Route('/sales', name: 'app_sales')]
    public function sales(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        return $this->render('pages/sale.html.twig', [
            'menu' => $menu,
        ]);
    }

    #[Route('/catalog', name: 'app_catalog')]
    public function catalog(
        CategoryRepository $categoryRepository,
        GoodsRepository    $goodsRepository,
        Request            $request,
        PaginatorInterface $paginator,

    ): Response
    {
        $goods = $goodsRepository->getGoodsByFilters($request->query->all());
        $pagination = $paginator->paginate($goods, $request->query->getInt('page', 1), 8);
        $menu = $categoryRepository->selectAllByName();


        return $this->render('pages/catalog.html.twig', [
            'menu' => $menu,
            'goods' => $pagination,
            'queryParams' => $request->query->all()

        ]);

    }

    #[Route('/catalog/{id}', name: 'app_categoryCatalog')]
    public function categoryCatalog($id,
                                    CategoryRepository $categoryRepository,
                                    GoodsRepository $goodsRepository,
                                    Request $request,
                                    PaginatorInterface $paginator
    ): Response
    {

        $goods = $goodsRepository->getGoodsByFilters(array_merge($request->query->all(),['category'=>$id]));
        $pagination = $paginator->paginate($goods, $request->query->getInt('page', 1), 8);
        $menu = $categoryRepository->selectAllByName();

        return $this->render('pages/catalog.html.twig', [
            'menu' => $menu,
            'goods' => $pagination,
            'queryParams' => $request->query->all()
        ]);


    }
}
