<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ProductRepository $productRepository)
    {
        $selection = ['framboisier', 'fraisier', 'foret-noire', 'multifruits'];

        $products = $productRepository->findBy([
            'slug' => $selection
        ], ['slug' => 'DESC'], 4);

        return $this->render('home.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/photos", name="photos")
     */
    public function photos()
    {
        return $this->render('photos.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions_legales")
     */
    public function mentions()
    {
        return $this->render('mentions-legales.html.twig');
    }
}
