<?php

namespace App\Controller;

use App\Repository\HeaderRepository;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ProductRepository $productRepository)
    {
        $products = $productRepository->findByIsBest(1);

        return $this->render('home.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/album-paques", name="album-paques")
     */
    // public function albumPaques()
    // {
    //     return $this->render('album-paques.html.twig');
    // }

    /**
     * @Route("/coffret-gp-code", name="coffret-gp-code")
     */
    public function coffretgpcode()
    {
        return $this->render('coffret-gp-code.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions_legales")
     */
    public function mentions()
    {
        return $this->render('mentions-legales.html.twig');
    }
}
